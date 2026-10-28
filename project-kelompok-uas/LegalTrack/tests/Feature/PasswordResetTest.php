<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Symfony\Component\Mailer\Exception\TransportException;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_is_isolated_in_memory_with_no_mysql_connection(): void
    {
        $this->assertSame('sqlite', config('database.default'));
        $this->assertSame(['sqlite'], array_keys(config('database.connections')));
        $this->assertSame(':memory:', DB::connection()->getDatabaseName());
        $this->assertSame('sqlite', DB::connection()->getPdo()->getAttribute(\PDO::ATTR_DRIVER_NAME));
    }

    public function test_guests_can_open_recovery_forms_from_the_login_page(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Lupa kata sandi?')
            ->assertSee(route('password.request'));

        $this->get(route('password.request'))
            ->assertOk()
            ->assertSee('Kirim Tautan Reset')
            ->assertSee('name="_token"', false);

        $this->get(route('password.reset', ['token' => 'example-token', 'email' => 'reset@example.test']))
            ->assertOk()
            ->assertSee('name="token" value="example-token"', false)
            ->assertSee('value="reset@example.test"', false)
            ->assertSee('name="password_confirmation"', false)
            ->assertHeader('Referrer-Policy', 'no-referrer');
    }

    public function test_authenticated_users_are_redirected_from_all_recovery_routes(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('password.request'))->assertRedirect(route('dashboard'));
        $this->post(route('password.email'))->assertRedirect(route('dashboard'));
        $this->get(route('password.reset', ['token' => 'example-token']))->assertRedirect(route('dashboard'));
        $this->post(route('password.update'))->assertRedirect(route('dashboard'));
    }

    public function test_registered_unknown_and_throttled_emails_receive_the_same_acknowledgement(): void
    {
        Notification::fake();
        $user = User::factory()->create();

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHasNoErrors()
            ->assertSessionHas('status');
        $acknowledgement = session('status');

        $this->post(route('password.email'), ['email' => 'unknown@example.test'])
            ->assertRedirect(route('password.request'))
            ->assertSessionHasNoErrors()
            ->assertSessionHas('status', $acknowledgement);

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHasNoErrors()
            ->assertSessionHas('status', $acknowledgement);

        Notification::assertSentToTimes($user, ResetPasswordNotification::class, 1);
        Notification::assertCount(1);
        Notification::assertSentTo($user, ResetPasswordNotification::class, function ($notification) use ($user) {
            $storedToken = DB::table('password_reset_tokens')->where('email', $user->email)->value('token');

            $this->assertNotSame($notification->token, $storedToken);
            $this->assertTrue(Hash::check($notification->token, $storedToken));
            $this->assertTrue(Password::tokenExists($user, $notification->token));

            return true;
        });
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => 'unknown@example.test']);
    }

    /** @dataProvider invalidEmails */
    public function test_reset_link_requests_validate_email($email): void
    {
        Notification::fake();

        $this->from(route('password.request'))
            ->post(route('password.email'), ['email' => $email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHasErrors('email');

        Notification::assertNothingSent();
        $this->assertDatabaseCount('password_reset_tokens', 0);
    }

    public static function invalidEmails(): array
    {
        return [
            'empty' => [''],
            'malformed' => ['not-an-email'],
            'too long' => [str_repeat('a', 250).'@example.test'],
            'array' => [['reset@example.test']],
        ];
    }

    public function test_link_request_ip_limit_does_not_consume_the_login_or_reset_limit(): void
    {
        Notification::fake();

        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('password.email'), ['email' => 'unknown@example.test'])->assertRedirect();
        }

        $this->post(route('password.email'), ['email' => 'unknown@example.test'])->assertStatus(429);
        $this->post(route('login.process'), [])->assertStatus(302);
        $this->post(route('password.update'), [])->assertStatus(302);
        Notification::assertNothingSent();
    }

    public function test_reset_attempts_have_a_separate_ip_limit(): void
    {
        for ($attempt = 0; $attempt < 5; $attempt++) {
            $this->post(route('password.update'), [])->assertStatus(302);
        }

        $this->post(route('password.update'), [])->assertStatus(429);
        $this->post(route('login.process'), [])->assertStatus(302);
        $this->post(route('password.email'), [])->assertStatus(302);
    }

    public function test_requesting_another_link_after_the_cooldown_replaces_the_previous_token(): void
    {
        Notification::fake();
        $user = User::factory()->create();

        $this->post(route('password.email'), ['email' => $user->email])->assertRedirect();
        $firstToken = Notification::sent($user, ResetPasswordNotification::class)->first()->token;

        $this->travel(config('auth.passwords.users.throttle') + 1)->seconds();
        $this->post(route('password.email'), ['email' => $user->email])->assertRedirect();
        $newToken = Notification::sent($user, ResetPasswordNotification::class)->last()->token;

        Notification::assertSentToTimes($user, ResetPasswordNotification::class, 2);
        $this->assertNotSame($firstToken, $newToken);
        $this->assertFalse(Password::tokenExists($user, $firstToken));
        $this->assertTrue(Password::tokenExists($user, $newToken));
        $this->assertDatabaseCount('password_reset_tokens', 1);
    }

    public function test_password_reset_rotates_remember_token_emits_event_and_allows_normal_login(): void
    {
        $user = User::factory()->create(['password' => 'old-password']);
        $rememberToken = $user->remember_token;
        $token = Password::createToken($user);
        Event::fake([PasswordReset::class]);

        $this->post(route('password.update'), $this->resetData($user, $token))
            ->assertRedirect(route('login'))
            ->assertSessionHasNoErrors()
            ->assertSessionHas('success');

        $user->refresh();
        $this->assertTrue(Hash::check('new-password', $user->password));
        $this->assertFalse(Hash::check('old-password', $user->password));
        $this->assertNotSame($rememberToken, $user->remember_token);
        $this->assertSame(60, strlen($user->remember_token));
        $this->assertDatabaseMissing('password_reset_tokens', ['email' => $user->email]);
        $this->assertGuest();
        Event::assertDispatched(PasswordReset::class, fn ($event) => $event->user->is($user));

        $this->post(route('login.process'), ['email' => $user->email, 'password' => 'old-password'])
            ->assertSessionHasErrors('email');
        $this->assertGuest();

        $this->post(route('login.process'), ['email' => $user->email, 'password' => 'new-password'])
            ->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    /** @dataProvider invalidResetFields */
    public function test_invalid_reset_fields_do_not_change_password_or_flash_sensitive_values(array $overrides, string $field): void
    {
        $user = User::factory()->create();
        $originalHash = $user->password;
        $token = Password::createToken($user);
        $url = route('password.reset', ['token' => $token, 'email' => $user->email]);

        $this->from($url)
            ->post(route('password.update'), array_replace($this->resetData($user, $token), $overrides))
            ->assertRedirect($url)
            ->assertSessionHasErrors($field)
            ->assertSessionMissing('_old_input.password')
            ->assertSessionMissing('_old_input.password_confirmation')
            ->assertSessionMissing('_old_input.token');

        $this->assertSame($originalHash, $user->fresh()->password);
        $this->assertTrue(Password::tokenExists($user, $token));
        $this->assertGuest();
    }

    public static function invalidResetFields(): array
    {
        return [
            'missing token' => [['token' => ''], 'token'],
            'array token' => [['token' => ['invalid']], 'token'],
            'invalid email' => [['email' => 'not-an-email'], 'email'],
            'missing password' => [['password' => ''], 'password'],
            'short password' => [['password' => 'short', 'password_confirmation' => 'short'], 'password'],
            'confirmation mismatch' => [['password_confirmation' => 'different-password'], 'password'],
            'missing confirmation' => [['password_confirmation' => ''], 'password'],
        ];
    }

    public function test_invalid_tokens_and_unknown_emails_share_the_same_error(): void
    {
        $user = User::factory()->create();
        $originalHash = $user->password;
        $token = Password::createToken($user);
        $url = route('password.reset', ['token' => 'invalid-token', 'email' => $user->email]);
        Event::fake([PasswordReset::class]);

        $this->from($url)->post(route('password.update'), $this->resetData($user, 'invalid-token'))
            ->assertRedirect($url)
            ->assertSessionHasErrors('email')
            ->assertSessionMissing('_old_input.token')
            ->assertSessionMissing('_old_input.password');
        $message = session('errors')->first('email');

        $this->post(route('password.update'), array_replace($this->resetData($user, $token), [
            'email' => 'unknown@example.test',
        ]))->assertSessionHasErrors(['email' => $message]);

        $this->assertSame($originalHash, $user->fresh()->password);
        $this->assertTrue(Password::tokenExists($user, $token));
        Event::assertNotDispatched(PasswordReset::class);
    }

    public function test_a_reset_token_cannot_be_used_for_another_account(): void
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $originalHash = $otherUser->password;
        $token = Password::createToken($user);

        $this->post(route('password.update'), $this->resetData($otherUser, $token))
            ->assertSessionHasErrors('email');

        $this->assertSame($originalHash, $otherUser->fresh()->password);
        $this->assertTrue(Password::tokenExists($user, $token));
    }

    public function test_expired_tokens_are_rejected_with_a_link_to_request_recovery_again(): void
    {
        $user = User::factory()->create();
        $originalHash = $user->password;
        $token = Password::createToken($user);
        $url = route('password.reset', ['token' => $token, 'email' => $user->email]);

        $this->travel(config('auth.passwords.users.expire') + 1)->minutes();
        $this->from($url)->post(route('password.update'), $this->resetData($user, $token))
            ->assertRedirect($url)
            ->assertSessionHasErrors('email');

        $this->get($url)->assertSee('kedaluwarsa')->assertSee('Minta tautan reset baru');
        $this->assertSame($originalHash, $user->fresh()->password);
        $this->assertGuest();
    }

    public function test_successfully_used_tokens_cannot_be_reused(): void
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $this->post(route('password.update'), $this->resetData($user, $token))
            ->assertRedirect(route('login'));
        $resetHash = $user->fresh()->password;

        $this->post(route('password.update'), array_replace($this->resetData($user, $token), [
            'password' => 'another-password',
            'password_confirmation' => 'another-password',
        ]))->assertSessionHasErrors('email');

        $this->assertSame($resetHash, $user->fresh()->password);
        $this->assertGuest();
    }

    public function test_notification_uses_indonesian_text_and_a_trusted_origin_even_with_an_untrusted_host(): void
    {
        config(['app.url' => 'https://legaltrack.example']);
        $user = User::factory()->create(['email' => 'reset@example.test']);
        $this->get('http://untrusted.example/forgot-password')->assertOk();

        $mail = (new ResetPasswordNotification('example-token'))->toMail($user);

        $this->assertSame('Atur Ulang Kata Sandi LegalTrack', $mail->subject);
        $this->assertSame('Atur Ulang Kata Sandi', $mail->actionText);
        $this->assertSame('https://legaltrack.example/reset-password/example-token?email=reset%40example.test', $mail->actionUrl);
        $this->assertContains('Tautan ini berlaku selama 60 menit.', array_merge($mail->introLines, $mail->outroLines));
    }

    public function test_mail_transport_failure_does_not_disclose_whether_an_account_exists(): void
    {
        $this->post(route('password.email'), ['email' => 'unknown@example.test'])->assertRedirect();
        $acknowledgement = session('status');

        Password::shouldReceive('sendResetLink')
            ->once()
            ->with(['email' => 'reset@example.test'])
            ->andThrow(new TransportException('Local mail transport unavailable.'));

        $this->post(route('password.email'), ['email' => 'reset@example.test'])
            ->assertRedirect(route('password.request'))
            ->assertSessionHasNoErrors()
            ->assertSessionHas('status', $acknowledgement);
    }

    public function test_reset_notification_renders_and_sends_through_the_local_array_mailer(): void
    {
        $user = User::factory()->create(['email' => 'reset@example.test']);

        $this->post(route('password.email'), ['email' => $user->email])
            ->assertRedirect(route('password.request'))
            ->assertSessionHasNoErrors();

        $messages = Mail::mailer()->getSymfonyTransport()->messages();
        $this->assertCount(1, $messages);
        $email = $messages->first()->getOriginalMessage();
        $this->assertSame('Atur Ulang Kata Sandi LegalTrack', $email->getSubject());
        $this->assertSame($user->email, $email->getTo()[0]->getAddress());
        $this->assertStringContainsString('/reset-password/', $email->getHtmlBody());
        $this->assertStringContainsString('Tautan ini berlaku selama 60 menit.', $email->getTextBody());
    }

    private function resetData(User $user, string $token): array
    {
        return [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ];
    }
}
