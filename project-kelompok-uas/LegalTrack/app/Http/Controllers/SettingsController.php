<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Menampilkan halaman pengaturan
     */
    public function index()
    {
        // Mengambil pengaturan batas pengingat kontrak
        $criticalDays = Setting::getValue('critical_days', 30);
        $nearDays = Setting::getValue('near_days', 60);

        return view('settings', compact(
            'criticalDays',
            'nearDays'
        ));
    }

    /**
     * Mengubah nama dan email administrator
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return back()->with(
            'success',
            'Data administrator berhasil diperbarui.'
        );
    }

    /**
     * Mengubah kata sandi administrator
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        // Periksa password lama
        if (!Hash::check(
            $validated['current_password'],
            $user->password
        )) {
            return back()
                ->withErrors([
                    'current_password' =>
                        'Kata sandi lama tidak sesuai.'
                ])
                ->withInput();
        }

        // Simpan password baru
        $user->password = Hash::make(
            $validated['password']
        );

        $user->save();

        return back()->with(
            'success',
            'Kata sandi berhasil diubah.'
        );
    }
}