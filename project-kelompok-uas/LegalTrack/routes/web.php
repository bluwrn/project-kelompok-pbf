<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

/*
|--------------------------------------------------------------------------
| PUBLIC AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:5,1')
        ->name('login.process');

    Route::get('/forgot-password', [PasswordResetController::class, 'showRequest'])
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetController::class, 'sendLink'])
        ->middleware('throttle:5,1,password-email:')
        ->name('password.email');

    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showReset'])
        ->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'reset'])
        ->middleware('throttle:5,1,password-reset:')
        ->name('password.update');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:5,1')
        ->name('register.process');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD - SEMUA MENU DALAM SATU HALAMAN
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [ContractController::class, 'dashboard'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | CONTRACT
    |--------------------------------------------------------------------------
    */

    Route::resource('contracts', ContractController::class);

    /*
    |--------------------------------------------------------------------------
    | SETTINGS / PENGATURAN
    |--------------------------------------------------------------------------
    */

    Route::put('/settings/profile', [SettingsController::class, 'updateProfile'])
        ->name('settings.profile.update');

    Route::put('/settings/password', [SettingsController::class, 'updatePassword'])
        ->name('settings.password.update');

    Route::post('/pengaturan/reminder', [ContractController::class, 'updateReminderSettings'])
        ->name('settings.reminder.update');

    /*
    |--------------------------------------------------------------------------
    | URL LAMA /settings
    |--------------------------------------------------------------------------
    | Kalau user membuka /settings secara manual,
    | tetap diarahkan ke Dashboard bagian Pengaturan.
    |--------------------------------------------------------------------------
    */

    Route::get('/settings', function () {
        return redirect('/dashboard#pengaturan');
    })->name('settings');
});
