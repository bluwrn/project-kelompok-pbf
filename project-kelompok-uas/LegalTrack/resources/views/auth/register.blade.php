<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - LegalTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <div class="mx-auto mb-4 h-28 w-full max-w-sm overflow-hidden">
                    <img src="{{ asset('images/logo-pt.png') }}" alt="Logo PT Mega Perkasa Jaya" class="h-full w-full object-cover">
                </div>
                <p class="text-slate-500 mt-1">Buat akun Sistem Manajemen Kontrak</p>
            </div>

            @if($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                           class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           placeholder="Nama lengkap">
                </div>

                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                           class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           placeholder="nama@perusahaan.com">
                </div>

                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Kata Sandi</label>
                    <input id="password" type="password" name="password" required minlength="8" autocomplete="new-password"
                           class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           placeholder="Minimal 8 karakter">
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required minlength="8" autocomplete="new-password"
                           class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           placeholder="Ulangi kata sandi">
                </div>

                <button type="submit" class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition">
                    Buat Akun
                </button>
            </form>

            <p class="mt-5 text-center text-sm text-slate-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-semibold text-blue-900 hover:text-blue-700">Masuk</a>
            </p>
        </div>

        <p class="text-center text-sm text-slate-500 mt-6">© {{ date('Y') }} LegalTrack</p>
    </div>
</body>
</html>