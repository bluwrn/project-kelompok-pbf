<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi - LegalTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <div class="mx-auto mb-4 h-28 w-full max-w-sm overflow-hidden">
                    <img src="{{ asset('images/logo-pt.png') }}" alt="Logo PT Mega Perkasa Jaya" class="h-full w-full object-cover">
                </div>
                <h1 class="text-xl font-semibold text-slate-800">Lupa Kata Sandi</h1>
                <p class="text-slate-500 mt-2">Masukkan email akun Anda untuk menerima tautan pengaturan ulang kata sandi.</p>
            </div>

            @if(session('status'))
                <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-700 px-4 py-3" role="status">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" maxlength="255"
                           class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           placeholder="nama@perusahaan.com">
                </div>

                <button type="submit" class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition">
                    Kirim Tautan Reset
                </button>
            </form>

            <p class="mt-5 text-center text-sm text-slate-600">
                <a href="{{ route('login') }}" class="font-semibold text-blue-900 hover:text-blue-700">Kembali ke halaman masuk</a>
            </p>
        </div>

        <p class="text-center text-sm text-slate-500 mt-6">© {{ date('Y') }} LegalTrack</p>
    </div>
</body>
</html>
