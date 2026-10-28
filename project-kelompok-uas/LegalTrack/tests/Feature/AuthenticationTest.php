<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_login_page(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('LegalTrack');
    }

    public function test_guest_can_view_registration_page(): void
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Buat Akun');
    }

    public function test_authenticated_user_is_redirected_from_login_page(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('login'))
            ->assertRedirect(route('dashboard'));
    }

    public function test_guest_is_redirected_to_login_from_protected_pages(): void
    {
        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));

        $this->get(route('contracts.index'))
            ->assertRedirect(route('login'));
    }

    public function test_user_can_log_in_and_is_redirected_to_dashboard(): void
    {
        $user = User::factory()->create([
            'password' => 'legaltrack-password',
        ]);

        $this->post(route('login.process'), [
            'email' => $user->email,
            'password' => 'legaltrack-password',
            'remember' => '1',
        ])
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('success');

        $this->assertAuthenticatedAs($user);
    }

    public function test_guest_can_register_and_is_authenticated(): void
    {
        $this->post(route('register.process'), [
            'name' => 'Pengguna Baru',
            'email' => 'baru@legaltrack.com',
            'password' => 'legaltrack-password',
            'password_confirmation' => 'legaltrack-password',
        ])
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('users', [
            'name' => 'Pengguna Baru',
            'email' => 'baru@legaltrack.com',
        ]);
        $this->assertAuthenticated();
    }

    public function test_registration_rejects_duplicate_email_and_mismatched_password(): void
    {
        $existingUser = User::factory()->create();

        $this->from(route('register'))
            ->post(route('register.process'), [
                'name' => 'Pengguna Baru',
                'email' => $existingUser->email,
                'password' => 'legaltrack-password',
                'password_confirmation' => 'different-password',
            ])
            ->assertRedirect(route('register'))
            ->assertSessionHasErrors(['email', 'password']);

        $this->assertGuest();
    }

    public function test_invalid_credentials_do_not_authenticate_user(): void
    {
        $user = User::factory()->create();

        $this->from(route('login'))
            ->post(route('login.process'), [
                'email' => $user->email,
                'password' => 'wrong-password',
            ])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_authenticated_user_can_log_out(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirect(route('login'))
            ->assertSessionHas('success');

        $this->assertGuest();
    }
}
