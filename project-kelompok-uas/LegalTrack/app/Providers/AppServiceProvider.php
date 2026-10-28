<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::toMailUsing(function ($notifiable, string $token) {
            // Gunakan URL aplikasi tepercaya, bukan header Host dari permintaan reset.
            $url = rtrim(config('app.url'), '/').route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false);

            return (new MailMessage)
                ->subject('Atur Ulang Kata Sandi LegalTrack')
                ->greeting('Halo!')
                ->line('Kami menerima permintaan untuk mengatur ulang kata sandi akun LegalTrack Anda.')
                ->action('Atur Ulang Kata Sandi', $url)
                ->line('Tautan ini berlaku selama '.config('auth.passwords.users.expire').' menit.')
                ->line('Jika Anda tidak meminta pengaturan ulang kata sandi, abaikan email ini.')
                ->salutation('Salam, LegalTrack');
        });
    }
}
