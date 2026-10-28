<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengaturan - LegalTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f1f5f9;
            color: #172033;
        }

        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: 270px;
            height: 100vh;
            background: #0f172a;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            overflow: hidden;
        }

        .main-content {
            margin-left: 270px;
            min-height: 100vh;
            width: calc(100% - 270px);
        }

        .menu-button {
            transition: all .2s ease;
        }

        .menu-button:hover {
            background: rgba(255, 255, 255, .08);
        }

        .menu-button.active {
            background: #2563eb;
        }

        /* =====================================================
           CARD
        ===================================================== */

        .card {
            background: white;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 5px 20px rgba(15, 23, 42, .05);
        }

        /* =====================================================
           INPUT
        ===================================================== */

        input,
        select {
            transition: all .2s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #2563eb !important;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .10);
        }

        /* =====================================================
           MOBILE
        ===================================================== */

        .mobile-sidebar {
            display: none;
        }

        @media (max-width: 900px) {

            .sidebar {
                width: 75px;
            }

            .main-content {
                margin-left: 75px;
                width: calc(100% - 75px);
            }

            .brand-text,
            .menu-text,
            .footer-text {
                display: none;
            }

            .menu-button {
                justify-content: center;
            }

        }

        @media (max-width: 640px) {

            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .mobile-sidebar {
                display: flex;
            }

        }

        /* =====================================================
           MODAL
        ===================================================== */

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .60);
            z-index: 300;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal.show {
            display: flex;
        }

    </style>
</head>


<body>

<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="sidebar text-white">

    <!-- LOGO -->
    <div class="px-7 py-8 border-b border-slate-700">

        <div class="flex items-center gap-4">

            <div
                class="w-14 h-14 rounded-2xl bg-blue-600
                       flex items-center justify-center
                       text-3xl"
            >
                📄
            </div>

            <div class="brand-text">

                <div class="text-2xl font-bold">
                    LegalTrack
                </div>

                <div class="text-slate-400 mt-1 text-sm">
                    Contract Management
                </div>

            </div>

        </div>

    </div>


    <!-- MENU -->
    <nav class="p-4 space-y-2">

        <!-- DASHBOARD -->
        <a
            href="{{ route('dashboard') }}"
            class="menu-button w-full flex items-center gap-4
                   px-5 py-4 rounded-xl text-left"
        >

            <span class="text-xl">
                🏠
            </span>

            <span class="menu-text font-semibold">
                Dashboard
            </span>

        </a>


        <!-- TAMBAH KONTRAK -->
        <a
            href="{{ route('dashboard') }}#tambah"
            class="menu-button w-full flex items-center gap-4
                   px-5 py-4 rounded-xl text-left"
        >

            <span class="text-xl">
                ＋
            </span>

            <span class="menu-text font-semibold">
                Tambah Kontrak
            </span>

        </a>


        <!-- DAFTAR KONTRAK -->
        <a
            href="{{ route('dashboard') }}#daftar"
            class="menu-button w-full flex items-center gap-4
                   px-5 py-4 rounded-xl text-left"
        >

            <span class="text-xl">
                ☷
            </span>

            <span class="menu-text font-semibold">
                Daftar Kontrak
            </span>

        </a>


        <!-- PENGATURAN -->
        <a
            href="{{ route('settings') }}"
            class="menu-button active w-full flex items-center gap-4
                   px-5 py-4 rounded-xl text-left"
        >

            <span class="text-xl">
                ⚙
            </span>

            <span class="menu-text font-semibold">
                Pengaturan
            </span>

        </a>

    </nav>


    <!-- ADMIN -->
    <div
        class="absolute bottom-0 left-0 right-0
               border-t border-slate-700 p-6"
    >

        <div class="flex items-center gap-4">

            <div
                class="w-12 h-12 rounded-full bg-blue-600
                       flex items-center justify-center
                       text-xl font-bold"
            >
                A
            </div>

            <div class="footer-text">

                <div class="font-bold">
                    Administrator
                </div>

                <div class="text-slate-400 text-sm">
                    Admin LegalTrack
                </div>

            </div>

        </div>

    </div>

</aside>


<!-- =========================================================
     MOBILE HEADER
========================================================= -->

<div
    class="mobile-sidebar fixed top-0 left-0 right-0
           bg-slate-900 text-white z-[150]
           p-4 items-center justify-between"
>

    <div class="font-bold text-xl">
        Legal<span class="text-blue-400">Track</span>
    </div>

</div>


<!-- =========================================================
     MAIN
========================================================= -->

<main class="main-content">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header
        class="bg-white border-b border-slate-200
               px-6 md:px-10 py-6"
    >

        <div
            class="max-w-[1600px] mx-auto
                   flex items-center justify-between"
        >

            <div>

                <h1
                    class="text-2xl md:text-3xl
                           font-bold text-slate-800"
                >
                    Pengaturan
                </h1>

                <p class="text-slate-400 mt-1">
                    Sistem Manajemen Kontrak Terintegrasi
                </p>

            </div>


            <div class="text-right hidden sm:block">

                <div
                    id="currentDate"
                    class="font-semibold text-slate-800"
                >
                </div>

                <div class="text-slate-400 text-sm mt-1">
                    Legal Department
                </div>

            </div>

        </div>

    </header>


    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <div class="p-5 md:p-8">

        <div class="max-w-[1600px] mx-auto space-y-6">


            <!-- =================================================
                 JUDUL PENGATURAN
            ================================================== -->

            <div class="mb-2">

                <h2
                    class="text-4xl md:text-5xl
                           font-bold text-slate-800"
                >
                    Pengaturan
                </h2>

                <p class="text-lg text-slate-500 mt-2">
                    Kelola akun, tampilan, keamanan,
                    notifikasi, dan preferensi LegalTrack.
                </p>

            </div>


            <!-- =================================================
                 AKUN ADMINISTRATOR
            ================================================== -->

            <section class="card p-6 md:p-8">

                <!-- HEADER CARD -->

                <div class="flex items-center gap-4 mb-7">

                    <div
                        class="w-14 h-14 rounded-2xl
                               bg-blue-50
                               flex items-center justify-center
                               text-2xl"
                    >
                        👤
                    </div>

                    <div>

                        <h3
                            class="text-2xl font-bold
                                   text-slate-800"
                        >
                            Akun Administrator
                        </h3>

                        <p class="text-slate-500 mt-1">
                            Kelola informasi akun administrator LegalTrack.
                        </p>

                    </div>

                </div>


                @php
                    $user = auth()->user();
                @endphp


                <!-- FORM PROFILE -->

                <form
                    action="{{ route('settings.profile.update') }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <div
                        class="grid grid-cols-1
                               lg:grid-cols-2 gap-5"
                    >

                        <!-- NAMA -->

                        <div>

                            <label
                                class="block font-semibold
                                       text-slate-700 mb-2"
                            >
                                Nama Administrator
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $user?->name ?? 'Administrator') }}"
                                placeholder="Nama administrator"
                                required
                                class="w-full border border-slate-300
                                       rounded-xl px-4 py-3.5"
                            >

                        </div>


                        <!-- EMAIL -->

                        <div>

                            <label
                                class="block font-semibold
                                       text-slate-700 mb-2"
                            >
                                Email Administrator
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $user?->email ?? 'admin@legaltrack.com') }}"
                                placeholder="admin@legaltrack.com"
                                required
                                class="w-full border border-slate-300
                                       rounded-xl px-4 py-3.5"
                            >

                        </div>

                    </div>


                    <!-- BUTTON -->

                    <div class="flex flex-wrap gap-3 mt-6">

                        <button
                            type="submit"
                            class="px-6 py-3.5
                                   bg-blue-600 hover:bg-blue-700
                                   text-white rounded-xl
                                   font-semibold transition"
                        >
                            Simpan Data Administrator
                        </button>


                        <button
                            type="button"
                            onclick="openPasswordModal()"
                            class="px-6 py-3.5
                                   bg-slate-100 hover:bg-slate-200
                                   text-slate-700 rounded-xl
                                   font-semibold transition"
                        >
                            🔐 Ubah Kata Sandi
                        </button>


                        <button
                            type="button"
                            onclick="forgotPassword()"
                            class="px-6 py-3.5
                                   border border-slate-300
                                   hover:bg-slate-50
                                   rounded-xl
                                   font-semibold transition"
                        >
                            Lupa Kata Sandi
                        </button>

                    </div>

                </form>

            </section>


            <!-- =================================================
                 TAMPILAN + KEAMANAN
            ================================================== -->

            <div
                class="grid grid-cols-1
                       xl:grid-cols-2 gap-6"
            >


                <!-- =============================================
                     TAMPILAN
                ============================================== -->

                <section class="card p-6 md:p-8">

                    <div class="flex items-center gap-4 mb-7">

                        <div
                            class="w-14 h-14 rounded-2xl
                                   bg-purple-50
                                   flex items-center justify-center
                                   text-2xl"
                        >
                            🎨
                        </div>

                        <div>

                            <h3
                                class="text-2xl font-bold
                                       text-slate-800"
                            >
                                Tampilan
                            </h3>

                            <p class="text-slate-500 mt-1">
                                Atur tampilan aplikasi.
                            </p>

                        </div>

                    </div>


                    <div class="space-y-6">

                        <!-- TEMA -->

                        <div>

                            <label
                                class="block font-semibold
                                       text-slate-700 mb-2"
                            >
                                Tema
                            </label>

                            <select
                                id="themeSelect"
                                class="w-full border border-slate-300
                                       rounded-xl px-4 py-3.5
                                       bg-white"
                            >

                                <option value="light">
                                    Terang
                                </option>

                                <option value="dark">
                                    Gelap
                                </option>

                            </select>

                        </div>


                        <!-- BAHASA -->

                        <div>

                            <label
                                class="block font-semibold
                                       text-slate-700 mb-2"
                            >
                                Ubah Bahasa
                            </label>

                            <select
                                id="languageSelect"
                                class="w-full border border-slate-300
                                       rounded-xl px-4 py-3.5
                                       bg-white"
                            >

                                <option value="id">
                                    🇮🇩 Bahasa Indonesia
                                </option>

                                <option value="en">
                                    🇬🇧 English
                                </option>

                            </select>

                        </div>

                    </div>

                </section>


                <!-- =============================================
                     KEAMANAN
                ============================================== -->

                <section class="card p-6 md:p-8">

                    <div class="flex items-center gap-4 mb-7">

                        <div
                            class="w-14 h-14 rounded-2xl
                                   bg-green-50
                                   flex items-center justify-center
                                   text-2xl"
                        >
                            🛡️
                        </div>

                        <div>

                            <h3
                                class="text-2xl font-bold
                                       text-slate-800"
                            >
                                Keamanan
                            </h3>

                            <p class="text-slate-500 mt-1">
                                Pengaturan keamanan akun.
                            </p>

                        </div>

                    </div>


                    <div class="space-y-4">

                        <!-- STATUS AKUN -->

                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   p-5 bg-slate-50
                                   rounded-xl"
                        >

                            <div>

                                <p class="font-semibold">
                                    Status Akun
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
                                    Administrator
                                </p>

                            </div>

                            <span
                                class="px-4 py-2
                                       bg-green-100
                                       text-green-700
                                       rounded-full
                                       text-sm font-semibold"
                            >
                                Aktif
                            </span>

                        </div>


                        <!-- PASSWORD -->

                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   p-5 bg-slate-50
                                   rounded-xl"
                        >

                            <div>

                                <p class="font-semibold">
                                    Password
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
                                    Gunakan password yang kuat.
                                </p>

                            </div>

                            <span
                                class="text-green-600
                                       font-semibold"
                            >
                                🔒 Aman
                            </span>

                        </div>


                        <!-- LOGIN -->

                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   p-5 bg-slate-50
                                   rounded-xl"
                        >

                            <div>

                                <p class="font-semibold">
                                    Keamanan Login
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
                                    Sistem autentikasi Laravel aktif.
                                </p>

                            </div>

                            <span
                                class="text-blue-600
                                       font-semibold"
                            >
                                Aktif
                            </span>

                        </div>

                    </div>

                </section>

            </div>


            <!-- =================================================
                 NOTIFIKASI + PREFERENSI
            ================================================== -->

            <div
                class="grid grid-cols-1
                       xl:grid-cols-2 gap-6"
            >


                <!-- =============================================
                     NOTIFIKASI
                ============================================== -->

                <section class="card p-6 md:p-8">

                    <div class="flex items-center gap-4 mb-7">

                        <div
                            class="w-14 h-14 rounded-2xl
                                   bg-orange-50
                                   flex items-center justify-center
                                   text-2xl"
                        >
                            🔔
                        </div>

                        <div>

                            <h3
                                class="text-2xl font-bold
                                       text-slate-800"
                            >
                                Notifikasi
                            </h3>

                            <p class="text-slate-500 mt-1">
                                Atur batas pengingat kontrak.
                            </p>

                        </div>

                    </div>


                    <form
                        action="{{ route('settings.reminder.update') }}"
                        method="POST"
                    >

                        @csrf


                        <div class="space-y-5">

                            <!-- CRITICAL -->

                            <div>

                                <label
                                    class="block font-semibold
                                           text-slate-700 mb-2"
                                >
                                    Peringatan Kritis
                                </label>

                                <div class="flex">

                                    <input
                                        type="number"
                                        name="critical_days"
                                        min="1"
                                        value="{{ old('critical_days', $criticalDays ?? 30) }}"
                                        required
                                        class="w-full border
                                               border-slate-300
                                               rounded-l-xl
                                               px-4 py-3.5"
                                    >

                                    <span
                                        class="flex items-center
                                               px-5
                                               bg-slate-100
                                               border border-l-0
                                               border-slate-300
                                               rounded-r-xl
                                               text-slate-600"
                                    >
                                        Hari
                                    </span>

                                </div>

                            </div>


                            <!-- NEAR -->

                            <div>

                                <label
                                    class="block font-semibold
                                           text-slate-700 mb-2"
                                >
                                    Mendekati Habis
                                </label>

                                <div class="flex">

                                    <input
                                        type="number"
                                        name="near_days"
                                        min="2"
                                        value="{{ old('near_days', $nearDays ?? 60) }}"
                                        required
                                        class="w-full border
                                               border-slate-300
                                               rounded-l-xl
                                               px-4 py-3.5"
                                    >

                                    <span
                                        class="flex items-center
                                               px-5
                                               bg-slate-100
                                               border border-l-0
                                               border-slate-300
                                               rounded-r-xl
                                               text-slate-600"
                                    >
                                        Hari
                                    </span>

                                </div>

                            </div>


                            <button
                                type="submit"
                                class="w-full
                                       bg-blue-600
                                       hover:bg-blue-700
                                       text-white
                                       py-3.5
                                       rounded-xl
                                       font-semibold
                                       transition"
                            >
                                💾 Simpan Pengaturan Notifikasi
                            </button>

                        </div>

                    </form>

                </section>


                <!-- =============================================
                     PREFERENSI
                ============================================== -->

                <section class="card p-6 md:p-8">

                    <div class="flex items-center gap-4 mb-7">

                        <div
                            class="w-14 h-14 rounded-2xl
                                   bg-cyan-50
                                   flex items-center justify-center
                                   text-2xl"
                        >
                            ⚙️
                        </div>

                        <div>

                            <h3
                                class="text-2xl font-bold
                                       text-slate-800"
                            >
                                Preferensi
                            </h3>

                            <p class="text-slate-500 mt-1">
                                Atur preferensi penggunaan LegalTrack.
                            </p>

                        </div>

                    </div>


                    <div class="space-y-4">


                        <!-- DATA TERBARU -->

                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   p-5 bg-slate-50
                                   rounded-xl"
                        >

                            <div>

                                <p class="font-semibold">
                                    Tampilan Daftar Kontrak
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
                                    Tampilkan data terbaru terlebih dahulu.
                                </p>

                            </div>

                            <span
                                class="text-blue-600
                                       font-semibold"
                            >
                                Aktif
                            </span>

                        </div>


                        <!-- KONFIRMASI -->

                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   p-5 bg-slate-50
                                   rounded-xl"
                        >

                            <div>

                                <p class="font-semibold">
                                    Konfirmasi Penghapusan
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
                                    Tampilkan konfirmasi sebelum menghapus.
                                </p>

                            </div>

                            <span
                                class="text-green-600
                                       font-semibold"
                            >
                                Aktif
                            </span>

                        </div>


                        <!-- RUPIAH -->

                        <div
                            class="flex items-center
                                   justify-between
                                   gap-4
                                   p-5 bg-slate-50
                                   rounded-xl"
                        >

                            <div>

                                <p class="font-semibold">
                                    Format Nilai Kontrak
                                </p>

                                <p class="text-sm text-slate-500 mt-1">
                                    Menggunakan format Rupiah.
                                </p>

                            </div>

                            <span class="font-bold">
                                IDR
                            </span>

                        </div>

                    </div>

                </section>

            </div>


            <!-- =================================================
                 TENTANG LEGALTRACK
            ================================================== -->

            <section class="card p-6 md:p-8">

                <div class="flex items-center gap-4 mb-6">

                    <div
                        class="w-14 h-14 rounded-2xl
                               bg-blue-50
                               flex items-center justify-center
                               text-2xl"
                    >
                        ℹ️
                    </div>

                    <div>

                        <h3
                            class="text-2xl font-bold
                                   text-slate-800"
                        >
                            Tentang LegalTrack
                        </h3>

                        <p class="text-slate-500 mt-1">
                            Informasi sistem.
                        </p>

                    </div>

                </div>


                <div
                    class="grid grid-cols-1
                           md:grid-cols-3 gap-5"
                >

                    <div
                        class="p-5 bg-slate-50
                               rounded-xl"
                    >

                        <p class="text-sm text-slate-500">
                            Nama Sistem
                        </p>

                        <p class="font-bold text-lg mt-1">
                            LegalTrack
                        </p>

                    </div>


                    <div
                        class="p-5 bg-slate-50
                               rounded-xl"
                    >

                        <p class="text-sm text-slate-500">
                            Fungsi
                        </p>

                        <p class="font-bold text-lg mt-1">
                            Contract Management
                        </p>

                    </div>


                    <div
                        class="p-5 bg-slate-50
                               rounded-xl"
                    >

                        <p class="text-sm text-slate-500">
                            Versi
                        </p>

                        <p class="font-bold text-lg mt-1">
                            1.0.0
                        </p>

                    </div>

                </div>

            </section>

        </div>

    </div>

</main>


<!-- =========================================================
     MODAL UBAH PASSWORD
========================================================= -->

<div
    id="passwordModal"
    class="modal"
>

    <div
        class="bg-white
               w-full max-w-lg
               rounded-2xl
               shadow-2xl
               p-7"
    >

        <div
            class="flex items-center
                   justify-between mb-6"
        >

            <div>

                <h3 class="text-2xl font-bold">
                    Ubah Kata Sandi
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Perbarui password administrator.
                </p>

            </div>

            <button
                type="button"
                onclick="closePasswordModal()"
                class="text-slate-400
                       hover:text-slate-700
                       text-2xl"
            >
                ×
            </button>

        </div>


        <form
            action="{{ route('settings.password.update') }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="space-y-4">

                <!-- PASSWORD LAMA -->

                <div>

                    <label
                        class="block font-semibold
                               text-slate-700 mb-2"
                    >
                        Kata Sandi Lama
                    </label>

                    <input
                        type="password"
                        name="current_password"
                        required
                        class="w-full
                               border border-slate-300
                               rounded-xl px-4 py-3"
                    >

                </div>


                <!-- PASSWORD BARU -->

                <div>

                    <label
                        class="block font-semibold
                               text-slate-700 mb-2"
                    >
                        Kata Sandi Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        minlength="8"
                        class="w-full
                               border border-slate-300
                               rounded-xl px-4 py-3"
                    >

                </div>


                <!-- KONFIRMASI -->

                <div>

                    <label
                        class="block font-semibold
                               text-slate-700 mb-2"
                    >
                        Konfirmasi Kata Sandi Baru
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        minlength="8"
                        class="w-full
                               border border-slate-300
                               rounded-xl px-4 py-3"
                    >

                </div>

            </div>


            <div class="flex gap-3 mt-6">

                <button
                    type="button"
                    onclick="closePasswordModal()"
                    class="flex-1
                           py-3
                           bg-slate-100
                           hover:bg-slate-200
                           rounded-xl
                           font-semibold"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="flex-1
                           py-3
                           bg-blue-600
                           hover:bg-blue-700
                           text-white
                           rounded-xl
                           font-semibold"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    /* =========================================================
       TANGGAL HEADER
    ========================================================= */

    const dateElement =
        document.getElementById('currentDate');

    const today = new Date();

    const dateFormatter =
        new Intl.DateTimeFormat('en-US', {
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        });

    dateElement.textContent =
        dateFormatter.format(today);


    /* =========================================================
       PASSWORD MODAL
    ========================================================= */

    function openPasswordModal() {

        document
            .getElementById('passwordModal')
            .classList.add('show');

    }


    function closePasswordModal() {

        document
            .getElementById('passwordModal')
            .classList.remove('show');

    }


    /* =========================================================
       LUPA PASSWORD
    ========================================================= */

    function forgotPassword() {

        alert(
            'Fitur Lupa Kata Sandi akan terhubung ke sistem reset password Laravel.'
        );

    }


    /* =========================================================
       TEMA
    ========================================================= */

    const themeSelect =
        document.getElementById('themeSelect');

    const savedTheme =
        localStorage.getItem('legaltrack_theme');

    if (savedTheme) {

        themeSelect.value = savedTheme;

    }


    themeSelect.addEventListener(
        'change',
        function () {

            localStorage.setItem(
                'legaltrack_theme',
                this.value
            );

            /*
             * Untuk sekarang pilihan disimpan.
             * Tampilan utama LegalTrack tetap mengikuti
             * desain Dashboard agar tidak berubah.
             */

        }
    );


    /* =========================================================
       BAHASA
    ========================================================= */

    const languageSelect =
        document.getElementById('languageSelect');

    const savedLanguage =
        localStorage.getItem('legaltrack_language');

    if (savedLanguage) {

        languageSelect.value =
            savedLanguage;

    }


    languageSelect.addEventListener(
        'change',
        function () {

            localStorage.setItem(
                'legaltrack_language',
                this.value
            );

        }
    );


    /* =========================================================
       TUTUP MODAL KETIKA KLIK LUAR
    ========================================================= */

    document
        .getElementById('passwordModal')
        .addEventListener(
            'click',
            function (event) {

                if (event.target === this) {

                    closePasswordModal();

                }

            }
        );

</script>


<!-- =========================================================
     SUCCESS MESSAGE
========================================================= -->

@if(session('success'))

<script>

    alert(@json(session('success')));

</script>

@endif


<!-- =========================================================
     ERROR MESSAGE
========================================================= -->

@if($errors->any())

<script>

    alert(
        @json($errors->first())
    );

</script>

@endif


</body>

</html>