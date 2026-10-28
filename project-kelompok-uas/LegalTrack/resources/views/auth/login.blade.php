<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - LegalTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <div class="mx-auto mb-4 h-28 w-full max-w-sm overflow-hidden">
                    <img
                        src="{{ asset('images/logo-pt.png') }}"
                        alt="Logo PT Mega Perkasa Jaya"
                        class="h-full w-full object-cover"
                    >
                </div>

                <p class="text-slate-500 mt-1">
                    Sistem Manajemen Kontrak
                </p>

            </div>


            {{-- Pesan berhasil --}}
            @if(session('success'))

                <div class="mb-4 rounded-lg
                            bg-green-50 border border-green-200
                            text-green-700 px-4 py-3">

                    {{ session('success') }}

                </div>

            @endif


            {{-- Pesan error --}}
            @if($errors->any())

                <div class="mb-4 rounded-lg
                            bg-red-50 border border-red-200
                            text-red-700 px-4 py-3">

                    {{ $errors->first() }}

                </div>

            @endif


            {{-- Form Login --}}
            <form action="{{ route('login.process') }}" method="POST">

                @csrf


                {{-- Email --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium
                                  text-slate-700 mb-2">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full px-4 py-3
                               border border-slate-300
                               rounded-xl
                               focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500
                               outline-none"
                        placeholder="admin@legaltrack.com"
                    >

                </div>


                {{-- Password --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium
                                  text-slate-700 mb-2">

                        Kata Sandi

                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-3
                               border border-slate-300
                               rounded-xl
                               focus:ring-2 focus:ring-blue-500
                               focus:border-blue-500
                               outline-none"
                        placeholder="Masukkan kata sandi"
                    >

                </div>


                {{-- Remember + Lupa Password --}}
                <div class="flex items-center justify-between mb-6">

                    <label class="flex items-center gap-2
                                  text-sm text-slate-600">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="rounded"
                        >

                        Ingat saya

                    </label>

                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-blue-900 hover:text-blue-700">
                        Lupa kata sandi?
                    </a>

                </div>


                {{-- Tombol Login --}}
                <button
                    type="submit"
                    class="w-full bg-blue-900
                           hover:bg-blue-800
                           text-white font-semibold
                           py-3 rounded-xl
                           transition"
                >

                    Masuk

                </button>

            </form>

            <p class="mt-5 text-center text-sm text-slate-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold text-blue-900 hover:text-blue-700">
                    Daftar sekarang
                </a>
            </p>

        </div>


        {{-- Footer --}}
        <p class="text-center text-sm text-slate-500 mt-6">

            © {{ date('Y') }} LegalTrack

        </p>

    </div>

</body>
</html>
