<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class PasswordResetController extends Controller
{
    public function showRequest()
    {
        return view('auth.forgot-password');
    }

    public function sendLink(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.max' => 'Email maksimal 255 karakter.',
        ]);

        try {
            // Jangan tampilkan perbedaan antara email tidak terdaftar dan masa tunggu pengiriman.
            Password::sendResetLink($validated);
        } catch (TransportExceptionInterface $exception) {
            // Kegagalan pengiriman juga tidak boleh mengungkap keberadaan akun.
            report($exception);
        }

        return redirect()->route('password.request')
            ->with('status', 'Jika email tersebut terdaftar, tautan untuk mengatur ulang kata sandi akan dikirim. Tunggu satu menit sebelum meminta tautan lagi.')
            ->withInput($request->only('email'));
    }

    public function showReset(Request $request, string $token)
    {
        $email = $request->query('email', '');

        return response()->view('auth.reset-password', [
            'token' => $token,
            'email' => is_string($email) ? $email : '',
        ])->header('Cache-Control', 'no-store, private')
            ->header('Referrer-Policy', 'no-referrer');
    }

    public function reset(Request $request)
    {
        $validated = $request->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'token.required' => 'Tautan pengaturan ulang kata sandi tidak valid. Silakan minta tautan baru.',
            'token.string' => 'Tautan pengaturan ulang kata sandi tidak valid. Silakan minta tautan baru.',
            'email.required' => 'Email wajib diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.max' => 'Email maksimal 255 karakter.',
            'password.required' => 'Kata sandi baru wajib diisi.',
            'password.string' => 'Kata sandi harus berupa teks.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai.',
        ]);

        $status = Password::reset($validated, function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')
                ->with('success', 'Kata sandi berhasil diatur ulang. Silakan masuk dengan kata sandi baru.');
        }

        return back()->withErrors([
            'email' => 'Tautan pengaturan ulang kata sandi tidak valid atau sudah kedaluwarsa. Silakan minta tautan baru.',
        ])->withInput($request->only('email'));
    }
}
