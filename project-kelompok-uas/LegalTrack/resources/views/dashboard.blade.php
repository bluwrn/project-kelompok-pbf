<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>LegalTrack - Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class'
        };
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        /* =========================================================
           DASAR
           ========================================================= */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #f1f5f9;
            color: #0f172a;

            transition:
                background-color .25s ease,
                color .25s ease;
        }


        /* =========================================================
           SIDEBAR
           ========================================================= */

        #sidebar {
            transition: transform .3s ease;
        }

        @media (max-width: 768px) {

            #sidebar {
                transform: translateX(-100%);
            }

            #sidebar.sidebar-open {
                transform: translateX(0);
            }

        }


        /* =========================================================
           PAGE TRANSITION
           ========================================================= */

        .page-section {
            animation: pageFade .25s ease;
        }

        @keyframes pageFade {

            from {
                opacity: 0;
                transform: translateY(5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }


        /* =========================================================
           SCROLLBAR
           ========================================================= */

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #e2e8f0;
        }

        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 20px;
        }


        /* =========================================================
           DARK MODE
           ========================================================= */

        html.theme-dark body {
            background-color: #0f172a !important;
            color: #e2e8f0 !important;
        }

        html.theme-dark main {
            background-color: #0f172a !important;
        }

        html.theme-dark .bg-white {
            background-color: #1e293b !important;
        }

        html.theme-dark .bg-slate-50 {
            background-color: #172033 !important;
        }

        html.theme-dark .bg-slate-100 {
            background-color: #1e293b !important;
        }

        html.theme-dark .text-slate-900 {
            color: #f8fafc !important;
        }

        html.theme-dark .text-slate-800 {
            color: #f1f5f9 !important;
        }

        html.theme-dark .text-slate-700 {
            color: #e2e8f0 !important;
        }

        html.theme-dark .text-slate-600 {
            color: #cbd5e1 !important;
        }

        html.theme-dark .text-slate-500 {
            color: #94a3b8 !important;
        }

        html.theme-dark .text-slate-400 {
            color: #94a3b8 !important;
        }

        html.theme-dark .border-slate-100 {
            border-color: #293548 !important;
        }

        html.theme-dark .border-slate-200 {
            border-color: #334155 !important;
        }

        html.theme-dark .border-slate-300 {
            border-color: #475569 !important;
        }

        html.theme-dark .divide-slate-200 > :not([hidden]) ~ :not([hidden]) {
            border-color: #334155 !important;
        }

        html.theme-dark select,
        html.theme-dark select option,
        html.theme-dark input,
        html.theme-dark textarea {
            background-color: #1e293b !important;
            color: #f8fafc !important;
            border-color: #475569 !important;
        }

        html.theme-dark select option {
            background-color: #1e293b !important;
            color: #f8fafc !important;
        }

        html.theme-dark input::placeholder,
        html.theme-dark textarea::placeholder {
            color: #94a3b8 !important;
        }

        html.theme-dark table thead {
            background-color: #172033 !important;
        }

        html.theme-dark table tbody tr:hover {
            background-color: #263449 !important;
        }

        html.theme-dark .shadow-sm,
        html.theme-dark .shadow,
        html.theme-dark .shadow-md,
        html.theme-dark .shadow-lg {
            box-shadow:
                0 4px 20px rgba(0, 0, 0, .20) !important;
        }


        /* =========================================================
           DARK MODE - HEADER
           ========================================================= */

        html.theme-dark header {
            background-color: #111827 !important;
            border-color: #334155 !important;
        }


        /* =========================================================
           DARK MODE - INPUT
           ========================================================= */

        html.theme-dark input:focus,
        html.theme-dark select:focus,
        html.theme-dark textarea:focus {
            outline: none;
            border-color: #3b82f6 !important;
        }


        /* =========================================================
           MOBILE OVERLAY
           ========================================================= */

        #sidebarOverlay {
            display: none;
        }

        @media (max-width: 768px) {

            #sidebarOverlay.active {
                display: block;
            }

        }


        /* =========================================================
           TABLE
           ========================================================= */

        .table-container {
            overflow-x: auto;
        }

        table {
            min-width: 900px;
        }


        /* =========================================================
           MODAL
           ========================================================= */

        .modal-overlay {
            backdrop-filter: blur(4px);
        }


        /* =========================================================
           SELECT FIX
           ========================================================= */

        select {
            cursor: pointer;
        }


        /* =========================================================
           BUTTON
           ========================================================= */

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

    </style>

</head>


<body>

<div class="min-h-screen">

    {{-- =========================================================
         SIDEBAR
         ========================================================= --}}

    <aside
        id="sidebar"
        class="fixed
               top-0
               left-0
               z-50
               w-[345px]
               h-screen
               bg-[#0f172a]
               text-white
               border-r
               border-slate-700
               flex
               flex-col"
    >

        {{-- LOGO --}}

        <div class="h-[132px]
                    px-8
                    flex
                    items-center
                    border-b
                    border-slate-700">

            <div class="flex items-center gap-4">

                <div class="w-16
                            h-16
                            rounded-2xl
                            bg-blue-600
                            flex
                            items-center
                            justify-center
                            shadow-lg">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-9 h-9"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M7 3h8l4 4v14H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 3v5h5"
                        />

                        <path
                            stroke-linecap="round"
                            d="M9 13h6M9 17h6"
                        />

                    </svg>

                </div>

                <div>

                    <div class="text-2xl font-bold">
                        LegalTrack
                    </div>

                    <div class="text-sm text-blue-200">
                        Contract Management
                    </div>

                </div>

            </div>

        </div>


        {{-- NAVIGATION --}}

        <nav class="flex-1 px-6 py-8 space-y-3">

            {{-- DASHBOARD --}}

            <a
                href="{{ route('dashboard') }}"
                onclick="showPage('dashboard')"
                data-page="dashboard"
                class="nav-item flex items-center gap-4
                       px-5 py-4
                       rounded-2xl
                       text-slate-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m3 11 9-8 9 8"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M5 10v10h14V10"
                    />

                </svg>

                <span
                    data-i18n="dashboard"
                    class="text-lg"
                >
                    Dashboard
                </span>

            </a>


            {{-- TAMBAH KONTRAK --}}

            <a
                href="{{ route('dashboard') }}#tambah"
                onclick="showPage('tambah')"
                data-page="tambah"
                class="nav-item flex items-center gap-4
                       px-5 py-4
                       rounded-2xl
                       text-slate-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <path
                        stroke-linecap="round"
                        d="M12 5v14M5 12h14"
                    />

                </svg>

                <span
                    data-i18n="tambahKontrak"
                    class="text-lg"
                >
                    Tambah Kontrak
                </span>

            </a>


            {{-- DAFTAR KONTRAK --}}

            <a
                href="{{ route('dashboard') }}#daftar"
                onclick="showPage('daftar')"
                data-page="daftar"
                class="nav-item flex items-center gap-4
                       px-5 py-4
                       rounded-2xl
                       text-slate-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <path
                        stroke-linecap="round"
                        d="M8 6h13M8 12h13M8 18h13"
                    />

                    <path
                        stroke-linecap="round"
                        d="M3 6h.01M3 12h.01M3 18h.01"
                    />

                </svg>

                <span
                    data-i18n="daftarKontrak"
                    class="text-lg"
                >
                    Daftar Kontrak
                </span>

            </a>


            {{-- PENGATURAN --}}

            <a
                href="{{ route('dashboard') }}#pengaturan"
                onclick="showPage('pengaturan')"
                data-page="pengaturan"
                class="nav-item flex items-center gap-4
                       px-5 py-4
                       rounded-2xl
                       text-slate-300
                       hover:bg-slate-800
                       hover:text-white
                       transition"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 15.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.9 1.9-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.56V20h-2.7v-.09a1.7 1.7 0 0 0-1.03-1.56 1.7 1.7 0 0 0-1.88.34l-.06.06-1.9-1.9.06-.06A1.7 1.7 0 0 0 7.76 15a1.7 1.7 0 0 0-1.56-1.03H6v-2.7h.2A1.7 1.7 0 0 0 7.76 10a1.7 1.7 0 0 0-.34-1.88l-.06-.06 1.9-1.9.06.06a1.7 1.7 0 0 0 1.88.34 1.7 1.7 0 0 0 1.03-1.56V5h2.7v.09a1.7 1.7 0 0 0 1.03 1.56 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.9 1.9-.06.06A1.7 1.7 0 0 0 18.24 10a1.7 1.7 0 0 0 1.56 1.03H20v2.7h-.09A1.7 1.7 0 0 0 19.4 15Z"
                    />

                </svg>

                <span
                    data-i18n="pengaturan"
                    class="text-lg"
                >
                    Pengaturan
                </span>

            </a>

        </nav>


        {{-- USER SIDEBAR --}}

        <div class="border-t border-slate-700 p-7">

            <div class="flex items-center gap-4">

                <div class="w-14
                            h-14
                            rounded-full
                            bg-blue-600
                            flex
                            items-center
                            justify-center
                            text-xl
                            font-bold">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>

                <div>

                    <div class="font-semibold text-lg">

                        {{ auth()->user()->name ?? 'Administrator' }}

                    </div>

                    <div class="text-sm text-slate-400">
                        Admin LegalTrack
                    </div>

                </div>

            </div>

            <form action="{{ route('logout') }}" method="POST" class="mt-5">
                @csrf
                <button
                    type="submit"
                    class="w-full rounded-lg border border-slate-600 px-4 py-2 text-sm font-medium text-slate-200 transition hover:bg-slate-700"
                >
                    Keluar
                </button>
            </form>

        </div>

    </aside>


    {{-- MOBILE OVERLAY --}}

    <div
        id="sidebarOverlay"
        onclick="closeSidebar()"
        class="fixed
               inset-0
               z-40
               bg-black/50"
    ></div>


    {{-- =========================================================
         MAIN
         ========================================================= --}}

    <main
        class="ml-[345px]
               min-h-screen
               bg-slate-100
               transition-all"
    >

        {{-- HEADER --}}

        <header
            class="sticky
                   top-0
                   z-30
                   h-[90px]
                   bg-white
                   border-b
                   border-slate-200
                   px-8
                   flex
                   items-center
                   justify-between"
        >

            <div class="flex items-center gap-4">

                {{-- MOBILE BUTTON --}}

                <button
                    onclick="openSidebar()"
                    class="md:hidden
                           w-11
                           h-11
                           rounded-xl
                           bg-blue-600
                           text-white
                           flex
                           items-center
                           justify-center"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-6 h-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                    </svg>

                </button>


                <div>

                    <h1
                        id="pageTitle"
                        class="text-2xl
                               font-bold
                               text-slate-900"
                    >
                        Dashboard
                    </h1>

                    <p
                        id="pageSubtitle"
                        class="text-slate-400"
                        data-i18n="contractManagement"
                    >
                        Sistem Manajemen Kontrak Terintegrasi
                    </p>

                </div>

            </div>


            <div class="text-right hidden sm:block">

                <div
                    id="currentDate"
                    class="font-semibold
                           text-slate-800"
                ></div>

                <div
                    class="text-sm
                           text-slate-400"
                    data-i18n="legalDepartment"
                >
                    Legal Department
                </div>

            </div>

        </header>


        {{-- =====================================================
             CONTENT
             ===================================================== --}}

        <div class="p-8">


            {{-- =================================================
                 DASHBOARD
                 ================================================= --}}

            <section
                id="page-dashboard"
                class="page-section"
            >

                {{-- STATISTICS --}}

                <div class="grid
                            grid-cols-1
                            sm:grid-cols-2
                            xl:grid-cols-4
                            gap-6
                            mb-8">

                    {{-- TOTAL --}}

                    <div class="bg-white
                                rounded-2xl
                                border
                                border-slate-200
                                p-6
                                shadow-sm">

                        <div class="flex justify-between items-start">

                            <div>

                                <p class="text-slate-500">
                                    Total Kontrak
                                </p>

                                <p class="mt-2
                                          text-3xl
                                          font-bold
                                          text-slate-900">

                                    {{ $totalContracts }}

                                </p>

                            </div>

                            <div class="w-12
                                        h-12
                                        rounded-xl
                                        bg-blue-100
                                        text-blue-600
                                        flex
                                        items-center
                                        justify-center">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6M9 8h6m5 12H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h10l6 6v10a2 2 0 0 1-2 2Z"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- ACTIVE --}}

                    <div class="bg-white
                                rounded-2xl
                                border
                                border-slate-200
                                p-6
                                shadow-sm">

                        <div class="flex justify-between items-start">

                            <div>

                                <p class="text-slate-500">
                                    Kontrak Aktif
                                </p>

                                <p class="mt-2
                                          text-3xl
                                          font-bold
                                          text-slate-900">

                                    {{ $activeContracts }}

                                </p>

                            </div>

                            <div class="w-12
                                        h-12
                                        rounded-xl
                                        bg-green-100
                                        text-green-600
                                        flex
                                        items-center
                                        justify-center">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m5 12 4 4L19 6"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- EXPIRING --}}

                    <div class="bg-white
                                rounded-2xl
                                border
                                border-slate-200
                                p-6
                                shadow-sm">

                        <div class="flex justify-between items-start">

                            <div>

                                <p class="text-slate-500">
                                    Berakhir Bulan Ini
                                </p>

                                <p class="mt-2
                                          text-3xl
                                          font-bold
                                          text-slate-900">

                                    {{ $expiringThisMonth }}

                                </p>

                            </div>

                            <div class="w-12
                                        h-12
                                        rounded-xl
                                        bg-yellow-100
                                        text-yellow-600
                                        flex
                                        items-center
                                        justify-center">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 9v4l2 2m6-3a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- VALUE --}}

                    <div class="bg-white
                                rounded-2xl
                                border
                                border-slate-200
                                p-6
                                shadow-sm">

                        <div class="flex justify-between items-start">

                            <div>

                                <p class="text-slate-500">
                                    Total Nilai Kontrak
                                </p>

                                <p class="mt-2
                                          text-2xl
                                          font-bold
                                          text-slate-900">

                                    Rp {{ number_format($totalValue, 0, ',', '.') }}

                                </p>

                            </div>

                            <div class="w-12
                                        h-12
                                        rounded-xl
                                        bg-purple-100
                                        text-purple-600
                                        flex
                                        items-center
                                        justify-center">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-2.5 0-4 1-4 2.5S9.5 13 12 13s4 1 4 2.5S14.5 18 12 18m0-10V6m0 12v-2"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- RECENT CONTRACTS --}}

                <div class="bg-white
                            rounded-2xl
                            border
                            border-slate-200
                            shadow-sm
                            mb-8">

                    <div class="p-6
                                border-b
                                border-slate-200
                                flex
                                items-center
                                justify-between">

                        <div>

                            <h2 class="text-xl
                                       font-bold
                                       text-slate-900">

                                Kontrak Terbaru

                            </h2>

                            <p class="text-slate-500 mt-1">
                                Daftar kontrak yang baru ditambahkan.
                            </p>

                        </div>

                        <a
                            href="{{ route('dashboard') }}#daftar"
                            onclick="showPage('daftar')"
                            class="text-blue-600
                                   hover:text-blue-700
                                   font-semibold"
                        >
                            Lihat Semua
                        </a>

                    </div>


                    <div class="table-container">

                        <table class="w-full text-left">

                            <thead
                                class="bg-slate-50
                                       text-slate-500
                                       text-sm"
                            >

                                <tr>

                                    <th class="px-6 py-4">
                                        Kode
                                    </th>

                                    <th class="px-6 py-4">
                                        Judul Kontrak
                                    </th>

                                    <th class="px-6 py-4">
                                        Pihak Terkait
                                    </th>

                                    <th class="px-6 py-4">
                                        Berakhir
                                    </th>

                                    <th class="px-6 py-4">
                                        Status
                                    </th>

                                </tr>

                            </thead>

                            <tbody
                                class="divide-y
                                       divide-slate-200"
                            >

                                @forelse($contracts->take(5) as $contract)

                                    <tr class="hover:bg-slate-50">

                                        <td class="px-6 py-4
                                                   font-semibold
                                                   text-blue-600">

                                            {{ $contract->kode }}

                                        </td>

                                        <td class="px-6 py-4">

                                            <div class="font-semibold">
                                                {{ $contract->judul }}
                                            </div>

                                            <div class="text-sm text-slate-400">
                                                {{ $contract->kategori }}
                                            </div>

                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $contract->pihak }}
                                        </td>

                                        <td class="px-6 py-4">

                                            {{ \Carbon\Carbon::parse($contract->tanggal_berakhir)->format('d/m/Y') }}

                                        </td>

                                        <td class="px-6 py-4">

                                            <span
                                                class="inline-flex
                                                       px-3
                                                       py-1
                                                       rounded-full
                                                       text-xs
                                                       font-semibold
                                                       bg-blue-100
                                                       text-blue-700"
                                            >

                                                {{ $contract->status }}

                                            </span>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="5"
                                            class="px-6 py-12
                                                   text-center
                                                   text-slate-400"
                                        >

                                            Belum ada kontrak.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- STATISTIK GRAFIK PIE CHART & OMSET --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    {{-- PIE CHART 1: KATEGORI KONTRAK --}}
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm flex flex-col justify-between">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900" data-i18n="chartKategoriTitle">
                                    Distribusi Kategori Kontrak
                                </h3>
                                <p class="text-sm text-slate-500 mt-0.5" data-i18n="chartKategoriDesc">
                                    Proporsi kontrak berdasarkan kategori
                                </p>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">
                                <span class="w-2 h-2 rounded-full bg-blue-500 mr-1.5 animate-pulse"></span>
                                {{ count($categoryStats ?? []) }} Kategori
                            </span>
                        </div>

                        @if(($totalContracts ?? 0) > 0 && count($categoryStats ?? []) > 0)
                            <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-6">
                                <div class="relative w-52 h-52 sm:w-56 sm:h-56 flex-shrink-0">
                                    <canvas id="categoryPieChart"></canvas>
                                </div>
                                <div class="flex-1 w-full space-y-2.5" id="categoryLegendList">
                                    {{-- Legend populated by JS --}}
                                </div>
                            </div>
                        @else
                            <div class="py-12 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                                </svg>
                                <p class="text-sm font-medium">Belum ada data kontrak untuk ditampilkan.</p>
                            </div>
                        @endif
                    </div>

                    {{-- GRAFIK CHART: TOTAL NILAI OMSET --}}
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm flex flex-col justify-between">
                        <div class="flex flex-wrap items-center justify-between pb-4 border-b border-slate-100 gap-2">
                            <div>
                                <h3 class="text-lg font-bold text-slate-900" data-i18n="chartOmsetTitle">
                                    Grafik Total Nilai Omset
                                </h3>
                                <p class="text-sm text-slate-500 mt-0.5" data-i18n="chartOmsetDesc">
                                    Akumulasi perolehan nilai kontrak
                                </p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="inline-flex p-1 bg-slate-100 rounded-xl" id="omsetModeToggle">
                                    <button
                                        type="button"
                                        id="btnOmsetMonthly"
                                        class="px-3 py-1 text-xs font-semibold rounded-lg bg-white text-blue-600 shadow-sm transition"
                                        onclick="switchOmsetChartMode('monthly')"
                                    >
                                        Bulanan
                                    </button>
                                    <button
                                        type="button"
                                        id="btnOmsetCategory"
                                        class="px-3 py-1 text-xs font-semibold rounded-lg text-slate-600 hover:text-slate-900 transition"
                                        onclick="switchOmsetChartMode('category')"
                                    >
                                        Per Kategori
                                    </button>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-purple-50 text-purple-700 border border-purple-100">
                                    Rp {{ number_format($totalValue ?? 0, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        @if(($totalContracts ?? 0) > 0)
                            <div class="pt-6 my-auto">
                                <div class="relative w-full h-56 sm:h-60">
                                    <canvas id="omsetBarChart"></canvas>
                                </div>
                            </div>
                        @else
                            <div class="py-12 text-center text-slate-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <p class="text-sm font-medium">Belum ada data nilai omset kontrak.</p>
                            </div>
                        @endif
                    </div>

                </div>

            </section>


            {{-- =================================================
                 TAMBAH KONTRAK
                 ================================================= --}}

            <section
                id="page-tambah"
                class="page-section hidden"
            >

                <div class="bg-white
                            rounded-2xl
                            border
                            border-slate-200
                            shadow-sm">

                    <div class="p-6 border-b border-slate-200">

                        <h2 class="text-2xl
                                   font-bold
                                   text-slate-900">

                            Tambah Kontrak

                        </h2>

                        <p class="mt-1 text-slate-500">
                            Masukkan informasi kontrak baru.
                        </p>

                    </div>


                    <form
                        action="{{ route('contracts.store') }}"
                        method="POST"
                        class="p-6"
                    >

                        @csrf

                        <div class="grid
                                    grid-cols-1
                                    md:grid-cols-2
                                    gap-6">


                            {{-- JUDUL --}}

                            <div class="md:col-span-2">

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Judul Kontrak

                                </label>

                                <input
                                    type="text"
                                    name="judul"
                                    required
                                    value="{{ old('judul') }}"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                    placeholder="Masukkan judul kontrak"
                                >

                            </div>


                            {{-- PIHAK --}}

                            <div>

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Pihak Terkait

                                </label>

                                <input
                                    type="text"
                                    name="pihak"
                                    required
                                    value="{{ old('pihak') }}"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                    placeholder="Nama pihak terkait"
                                >

                            </div>


                            {{-- KATEGORI --}}

                            <div>

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Kategori

                                </label>

                                <select
                                    name="kategori"
                                    required
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           bg-white
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                >

                                    <option value="">
                                        Pilih kategori
                                    </option>

                                    <option value="Karyawan">
                                        Karyawan
                                    </option>

                                    <option value="Vendor">
                                        Vendor
                                    </option>

                                    <option value="Sub-kontraktor">
                                        Sub-kontraktor
                                    </option>

                                    <option value="Klien">
                                        Klien
                                    </option>

                                </select>

                            </div>


                            {{-- NILAI --}}

                            <div>

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Nilai Kontrak

                                </label>

                                <div class="relative">

                                    <span
                                        class="absolute
                                               left-4
                                               top-1/2
                                               -translate-y-1/2
                                               text-slate-500"
                                    >
                                        Rp
                                    </span>

                                    <input
                                        type="text"
                                        id="nilaiKontrak"
                                        name="nilai_kontrak"
                                        required
                                        class="w-full
                                               pl-12
                                               pr-4
                                               py-3
                                               rounded-xl
                                               border
                                               border-slate-300
                                               focus:outline-none
                                               focus:ring-2
                                               focus:ring-blue-500"
                                        placeholder="0"
                                    >

                                </div>

                            </div>


                            {{-- PENANGGUNG JAWAB --}}

                            <div>

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Penanggung Jawab

                                </label>

                                <input
                                    type="text"
                                    name="penanggung_jawab"
                                    required
                                    value="{{ old('penanggung_jawab') }}"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                    placeholder="Nama penanggung jawab"
                                >

                            </div>


                            {{-- TANGGAL MULAI --}}

                            <div>

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Tanggal Mulai

                                </label>

                                <input
                                    type="date"
                                    name="tanggal_mulai"
                                    required
                                    value="{{ old('tanggal_mulai') }}"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                >

                            </div>


                            {{-- TANGGAL BERAKHIR --}}

                            <div>

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Tanggal Berakhir

                                </label>

                                <input
                                    type="date"
                                    name="tanggal_berakhir"
                                    required
                                    value="{{ old('tanggal_berakhir') }}"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                >

                            </div>


                            {{-- STATUS --}}

                            <div>

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Status

                                </label>

                                <select
                                    name="status"
                                    required
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           bg-white
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                >

                                    <option value="">
                                        Pilih status
                                    </option>

                                    <option value="Draft">
                                        Draft
                                    </option>

                                    <option value="Review Internal">
                                        Review Internal
                                    </option>

                                    <option value="Review Eksternal">
                                        Review Eksternal
                                    </option>

                                    <option value="Revisi">
                                        Revisi
                                    </option>

                                    <option value="Menunggu Tanda Tangan">
                                        Menunggu Tanda Tangan
                                    </option>

                                    <option value="Selesai Ditandatangani">
                                        Selesai Ditandatangani
                                    </option>

                                </select>

                            </div>


                            {{-- KETERANGAN --}}

                            <div class="md:col-span-2">

                                <label class="block
                                              mb-2
                                              font-semibold
                                              text-slate-700">

                                    Keterangan

                                </label>

                                <textarea
                                    name="keterangan"
                                    rows="5"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                    placeholder="Tambahkan keterangan kontrak..."
                                >{{ old('keterangan') }}</textarea>

                            </div>

                        </div>


                        <div class="mt-8
                                    flex
                                    flex-wrap
                                    gap-3
                                    justify-end">

                            <button
                                type="button"
                                onclick="showPage('dashboard')"
                                class="px-6
                                       py-3
                                       rounded-xl
                                       border
                                       border-slate-300
                                       text-slate-700
                                       hover:bg-slate-50"
                            >

                                Batal

                            </button>

                            <button
                                type="submit"
                                class="px-7
                                       py-3
                                       rounded-xl
                                       bg-blue-600
                                       text-white
                                       font-semibold
                                       hover:bg-blue-700
                                       transition"
                            >

                                Simpan Kontrak

                            </button>

                        </div>

                    </form>

                </div>

            </section>


            {{-- =================================================
                 DAFTAR KONTRAK
                 ================================================= --}}

            <section
                id="page-daftar"
                class="page-section hidden"
            >

                <div class="bg-white
                            rounded-2xl
                            border
                            border-slate-200
                            shadow-sm">


                    {{-- HEADER --}}

                    <div class="p-6
                                border-b
                                border-slate-200">

                        <h2 class="text-2xl
                                   font-bold
                                   text-slate-900">

                            Daftar Kontrak

                        </h2>

                        <p class="mt-1 text-slate-500">

                            Kelola seluruh data kontrak LegalTrack.

                        </p>

                    </div>


                    {{-- FILTER --}}

                    <div class="p-6
                                grid
                                grid-cols-1
                                md:grid-cols-2
                                xl:grid-cols-4
                                gap-4
                                border-b
                                border-slate-200">


                        <input
                            type="text"
                            id="contractSearch"
                            placeholder="Cari kode, judul, pihak..."
                            class="px-4
                                   py-3
                                   rounded-xl
                                   border
                                   border-slate-300
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500"
                        >


                        <select
                            id="filterKategori"
                            class="px-4
                                   py-3
                                   rounded-xl
                                   border
                                   border-slate-300
                                   bg-white"
                        >

                            <option value="">
                                Semua Kategori
                            </option>

                            <option value="Karyawan">
                                Karyawan
                            </option>

                            <option value="Vendor">
                                Vendor
                            </option>

                            <option value="Sub-kontraktor">
                                Sub-kontraktor
                            </option>

                            <option value="Klien">
                                Klien
                            </option>

                        </select>


                        <select
                            id="filterStatus"
                            class="px-4
                                   py-3
                                   rounded-xl
                                   border
                                   border-slate-300
                                   bg-white"
                        >

                            <option value="">
                                Semua Status
                            </option>

                            <option value="Draft">
                                Draft
                            </option>

                            <option value="Review Internal">
                                Review Internal
                            </option>

                            <option value="Review Eksternal">
                                Review Eksternal
                            </option>

                            <option value="Revisi">
                                Revisi
                            </option>

                            <option value="Menunggu Tanda Tangan">
                                Menunggu Tanda Tangan
                            </option>

                            <option value="Selesai Ditandatangani">
                                Selesai Ditandatangani
                            </option>

                        </select>


                        <select
                            id="filterReminder"
                            class="px-4
                                   py-3
                                   rounded-xl
                                   border
                                   border-slate-300
                                   bg-white"
                        >

                            <option value="">
                                Semua Pengingat
                            </option>

                            <option value="expired">
                                Kedaluwarsa
                            </option>

                            <option value="critical">
                                Peringatan Kritis
                            </option>

                            <option value="near">
                                Mendekati Habis
                            </option>

                            <option value="safe">
                                Aman
                            </option>

                        </select>

                    </div>


                    {{-- PER PAGE & TOOLBAR --}}
                    <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <label for="perPageSelect" class="text-sm font-medium text-slate-600 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                                <span data-i18n="tampilkanPerHalaman">Tampilkan:</span>
                            </label>
                            <select
                                id="perPageSelect"
                                class="px-3 py-1.5 rounded-xl border border-slate-300 bg-white text-sm font-semibold text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-sm transition"
                            >
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="all">Semua data</option>
                            </select>
                        </div>

                        <div class="text-xs text-slate-500 font-medium flex items-center gap-1.5">
                            <span data-i18n="ditemukanTotal">Total ditemukan:</span>
                            <span id="filteredCountBadge" class="font-bold text-blue-600 px-2 py-0.5 rounded-full bg-blue-50 border border-blue-100">{{ $contracts->count() }}</span>
                            <span data-i18n="kontrak">kontrak</span>
                        </div>
                    </div>


                    {{-- TABLE --}}

                    <div class="table-container">

                        <table class="w-full">

                            <thead
                                class="bg-slate-50
                                       text-slate-500
                                       text-sm"
                            >

                                <tr>

                                    <th class="px-6 py-4">
                                        Kode
                                    </th>

                                    <th class="px-6 py-4">
                                        Kontrak
                                    </th>

                                    <th class="px-6 py-4">
                                        Kategori
                                    </th>

                                    <th class="px-6 py-4">
                                        Nilai
                                    </th>

                                    <th class="px-6 py-4">
                                        Berakhir
                                    </th>

                                    <th class="px-6 py-4">
                                        Pengingat
                                    </th>

                                    <th class="px-6 py-4">
                                        Status
                                    </th>

                                    <th class="px-6 py-4">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody
                                id="contractTableBody"
                                class="divide-y
                                       divide-slate-200"
                            >

                                @forelse($contracts as $contract)

                                    @php

                                        $daysRemaining =
                                            now()
                                                ->startOfDay()
                                                ->diffInDays(
                                                    \Carbon\Carbon::parse($contract->tanggal_berakhir)->startOfDay(),
                                                    false
                                                );

                                        if ($daysRemaining < 0) {

                                            $reminderType = 'expired';
                                            $reminderLabel = 'KEDALUWARSA';
                                            $reminderClass = 'bg-red-100 text-red-700';

                                        } elseif ($daysRemaining <= $criticalDays) {

                                            $reminderType = 'critical';
                                            $reminderLabel = 'PERINGATAN KRITIS';
                                            $reminderClass = 'bg-orange-100 text-orange-700';

                                        } elseif ($daysRemaining <= $nearDays) {

                                            $reminderType = 'near';
                                            $reminderLabel = 'MENDEKATI HABIS';
                                            $reminderClass = 'bg-yellow-100 text-yellow-700';

                                        } else {

                                            $reminderType = 'safe';
                                            $reminderLabel = 'AMAN';
                                            $reminderClass = 'bg-green-100 text-green-700';

                                        }

                                    @endphp


                                    <tr
                                        class="contract-row
                                               hover:bg-slate-50"
                                        data-search="{{ strtolower($contract->kode . ' ' . $contract->judul . ' ' . $contract->pihak) }}"
                                        data-kategori="{{ $contract->kategori }}"
                                        data-status="{{ $contract->status }}"
                                        data-reminder="{{ $reminderType }}"
                                    >

                                        {{-- KODE --}}

                                        <td class="px-6 py-5">

                                            <div class="font-semibold
                                                        text-blue-600">

                                                {{ $contract->kode }}

                                            </div>

                                        </td>


                                        {{-- KONTRAK --}}

                                        <td class="px-6 py-5">

                                            <div class="font-semibold
                                                        text-slate-900">

                                                {{ $contract->judul }}

                                            </div>

                                            <div class="text-sm
                                                        text-slate-500
                                                        mt-1">

                                                {{ $contract->pihak }}

                                            </div>

                                        </td>


                                        {{-- KATEGORI --}}

                                        <td class="px-6 py-5">

                                            {{ $contract->kategori }}

                                        </td>


                                        {{-- NILAI --}}

                                        <td class="px-6 py-5
                                                   whitespace-nowrap">

                                            Rp
                                            {{ number_format($contract->nilai_kontrak, 0, ',', '.') }}

                                        </td>


                                        {{-- TANGGAL --}}

                                        <td class="px-6 py-5
                                                   whitespace-nowrap">

                                            <div>

                                                {{ \Carbon\Carbon::parse($contract->tanggal_berakhir)->format('d/m/Y') }}

                                            </div>

                                            <div class="text-xs
                                                        text-slate-400
                                                        mt-1">

                                                @if($daysRemaining < 0)

                                                    Sudah lewat

                                                @else

                                                    {{ $daysRemaining }} hari lagi

                                                @endif

                                            </div>

                                        </td>


                                        {{-- REMINDER --}}

                                        <td class="px-6 py-5">

                                            <span
                                                class="inline-flex
                                                       px-3
                                                       py-1
                                                       rounded-full
                                                       text-xs
                                                       font-semibold
                                                       {{ $reminderClass }}"
                                            >

                                                {{ $reminderLabel }}

                                            </span>

                                        </td>


                                        {{-- STATUS --}}

                                        <td class="px-6 py-5">

                                            <span
                                                class="inline-flex
                                                       px-3
                                                       py-1
                                                       rounded-full
                                                       text-xs
                                                       font-semibold
                                                       bg-blue-100
                                                       text-blue-700"
                                            >

                                                {{ $contract->status }}

                                            </span>

                                        </td>


                                        {{-- AKSI --}}

                                        <td class="px-6 py-5">

                                            <div class="flex items-center gap-2">

                                                <a
                                                    href="{{ route('contracts.show', $contract) }}"
                                                    class="px-3
                                                           py-2
                                                           rounded-lg
                                                           bg-blue-50
                                                           text-blue-600
                                                           hover:bg-blue-100"
                                                >
                                                    Detail
                                                </a>


                                                <a
                                                    href="{{ route('contracts.edit', $contract) }}"
                                                    class="px-3
                                                           py-2
                                                           rounded-lg
                                                           bg-yellow-50
                                                           text-yellow-700
                                                           hover:bg-yellow-100"
                                                >
                                                    Edit
                                                </a>


                                                <form
                                                    action="{{ route('contracts.destroy', $contract) }}"
                                                    method="POST"
                                                    class="delete-form relative z-10 pointer-events-auto"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="px-3
                                                               py-2
                                                               rounded-lg
                                                               bg-red-50
                                                               text-red-600
                                                               hover:bg-red-100"
                                                    >
                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="8"
                                            class="px-6 py-16
                                                   text-center
                                                   text-slate-400"
                                        >

                                            Belum ada data kontrak.

                                        </td>

                                    </tr>

                                @endforelse


                                {{-- EMPTY FILTER --}}

                                <tr
                                    id="emptyFilterRow"
                                    class="hidden"
                                >

                                    <td
                                        colspan="8"
                                        class="px-6 py-16
                                               text-center
                                               text-slate-400"
                                    >

                                        Tidak ada kontrak yang sesuai dengan filter.

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>


                    {{-- PAGINATION CONTAINER --}}
                    <div
                        id="contractPaginationWrapper"
                        class="px-6 py-4 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-b-2xl"
                    >
                        <div id="paginationSummaryText" class="text-sm text-slate-500">
                            <span data-i18n="menampilkan">Menampilkan</span>
                            <span id="pageStartNum" class="font-semibold text-slate-800">1</span>
                            <span data-i18n="sampai">sampai</span>
                            <span id="pageEndNum" class="font-semibold text-slate-800">10</span>
                            <span data-i18n="dari">dari</span>
                            <span id="pageTotalNum" class="font-semibold text-slate-800">{{ $contracts->count() }}</span>
                            <span data-i18n="kontrak">kontrak</span>
                        </div>

                        <div class="flex items-center gap-1.5" id="paginationNavButtons">
                            <button
                                type="button"
                                id="prevPageBtn"
                                class="px-3.5 py-2 rounded-xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 text-sm font-medium transition disabled:opacity-40 disabled:cursor-not-allowed flex items-center gap-1 shadow-sm"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                <span data-i18n="sebelumnya">Sebelumnya</span>
                            </button>

                            <div id="pageNumberList" class="flex items-center gap-1">
                                {{-- Dynamically generated by JS --}}
                            </div>

                            <button
                                type="button"
                                id="nextPageBtn"
                                class="px-3.5 py-2 rounded-xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 text-sm font-medium transition disabled:opacity-40 disabled:cursor-not-allowed flex items-center gap-1 shadow-sm"
                            >
                                <span data-i18n="berikutnya">Berikutnya</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                    </div>

                </div>

            </section>


            {{-- =================================================
                 PENGATURAN
                 ================================================= --}}

            <section
                id="page-pengaturan"
                class="page-section hidden"
            >


                {{-- AKUN ADMINISTRATOR --}}

                <div
                    class="bg-white
                           rounded-2xl
                           border
                           border-slate-200
                           shadow-sm
                           mb-8"
                >

                    <div class="p-7
                                border-b
                                border-slate-200">

                        <h2
                            class="text-2xl
                                   font-bold
                                   text-slate-900"
                            data-i18n="akunAdministrator"
                        >
                            Akun Administrator
                        </h2>

                        <p class="mt-2
                                  text-slate-500"
                           data-i18n="pengaturanAkun"
                        >
                            Kelola informasi akun administrator.
                        </p>

                    </div>


                    <form
                        action="{{ route('settings.profile.update') }}"
                        method="POST"
                        class="p-7"
                    >

                        @csrf

                        @method('PUT')


                        <div class="grid
                                    grid-cols-1
                                    md:grid-cols-2
                                    gap-6">


                            {{-- NAMA --}}

                            <div>

                                <label
                                    class="block
                                           mb-2
                                           font-semibold
                                           text-slate-700"
                                    data-i18n="nama"
                                >
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    required
                                    value="{{ auth()->user()->name ?? 'Administrator' }}"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           bg-white"
                                >

                            </div>


                            {{-- EMAIL --}}

                            <div>

                                <label
                                    class="block
                                           mb-2
                                           font-semibold
                                           text-slate-700"
                                    data-i18n="email"
                                >
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    required
                                    value="{{ auth()->user()->email ?? '' }}"
                                    class="w-full
                                           px-4
                                           py-3
                                           rounded-xl
                                           border
                                           border-slate-300
                                           bg-white"
                                >

                            </div>

                        </div>


                        {{-- BUTTONS --}}

                        <div class="mt-6
                                    flex
                                    flex-wrap
                                    gap-4">

                            <button
                                type="submit"
                                class="px-7
                                       py-4
                                       rounded-2xl
                                       bg-blue-600
                                       text-white
                                       font-bold
                                       hover:bg-blue-700
                                       transition"
                                data-i18n="simpanPerubahan"
                            >

                                Simpan Perubahan

                            </button>


                            <button
                                type="button"
                                onclick="openPasswordModal()"
                                class="px-7
                                       py-4
                                       rounded-2xl
                                       border
                                       border-slate-300
                                       text-slate-800
                                       hover:bg-slate-50
                                       transition"
                                data-i18n="ubahKataSandi"
                            >

                                Ubah Kata Sandi

                            </button>


                            <button
                                type="button"
                                onclick="forgotPassword()"
                                class="px-7
                                       py-4
                                       rounded-2xl
                                       border
                                       border-slate-300
                                       text-slate-800
                                       hover:bg-slate-50
                                       transition"
                                data-i18n="lupaKataSandi"
                            >

                                Lupa Kata Sandi

                            </button>

                        </div>

                    </form>

                </div>


                {{-- TAMPILAN + KEAMANAN --}}

                <div class="grid
                            grid-cols-1
                            xl:grid-cols-2
                            gap-8
                            mb-8">


                    {{-- TAMPILAN --}}

                    <div
                        class="bg-white
                               rounded-2xl
                               border
                               border-slate-200
                               shadow-sm"
                    >

                        <div
                            class="p-7
                                   border-b
                                   border-slate-200"
                        >

                            <h2
                                class="text-2xl
                                       font-bold
                                       text-slate-900"
                                data-i18n="tampilan"
                            >
                                Tampilan
                            </h2>

                            <p
                                class="mt-2
                                      text-slate-500"
                                data-i18n="aturTampilan"
                            >
                                Atur tampilan aplikasi sesuai kebutuhan.
                            </p>

                        </div>


                        <div class="p-7">


                            {{-- TEMA --}}

                            <div class="mb-7">

                                <label
                                    class="block
                                           mb-3
                                           font-semibold
                                           text-slate-800"
                                    data-i18n="tema"
                                >
                                    Tema
                                </label>

                                <select
                                    id="themeSelect"
                                    class="w-full
                                           px-4
                                           py-4
                                           rounded-xl
                                           border
                                           border-slate-300
                                           bg-white
                                           text-slate-800
                                           text-lg
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                >

                                    <option
                                        value="light"
                                        data-i18n="terang"
                                    >
                                        Terang
                                    </option>

                                    <option
                                        value="dark"
                                        data-i18n="gelap"
                                    >
                                        Gelap
                                    </option>

                                </select>

                                <p
                                    class="mt-3
                                          text-slate-400"
                                    data-i18n="pilihTema"
                                >
                                    Pilih tema tampilan LegalTrack.
                                </p>

                            </div>


                            {{-- BAHASA --}}

                            <div>

                                <label
                                    class="block
                                           mb-3
                                           font-semibold
                                           text-slate-800"
                                    data-i18n="ubahBahasa"
                                >
                                    Ubah Bahasa
                                </label>

                                <select
                                    id="languageSelect"
                                    class="w-full
                                           px-4
                                           py-4
                                           rounded-xl
                                           border
                                           border-slate-300
                                           bg-white
                                           text-slate-800
                                           text-lg
                                           focus:outline-none
                                           focus:ring-2
                                           focus:ring-blue-500"
                                >

                                    <option
                                        value="id"
                                        data-i18n="indonesia"
                                    >
                                        ID Indonesia
                                    </option>

                                    <option
                                        value="en"
                                        data-i18n="inggris"
                                    >
                                        EN English
                                    </option>

                                </select>

                                <p
                                    class="mt-3
                                          text-slate-400"
                                    data-i18n="bahasaDigunakan"
                                >
                                    Bahasa yang digunakan pada aplikasi.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- KEAMANAN --}}

                    <div
                        class="bg-white
                               rounded-2xl
                               border
                               border-slate-200
                               shadow-sm"
                    >

                        <div
                            class="p-7
                                   border-b
                                   border-slate-200"
                        >

                            <h2
                                class="text-2xl
                                       font-bold
                                       text-slate-900"
                                data-i18n="keamanan"
                            >
                                Keamanan
                            </h2>

                            <p
                                class="mt-2
                                      text-slate-500"
                                data-i18n="pengaturanKeamanan"
                            >
                                Pengaturan keamanan akun.
                            </p>

                        </div>


                        <div class="p-7">


                            {{-- LOGIN --}}

                            <div
                                class="flex
                                       items-center
                                       justify-between
                                       gap-4
                                       pb-7"
                            >

                                <div>

                                    <h3
                                        class="text-xl
                                               font-semibold
                                               text-slate-900"
                                        data-i18n="loginAdministrator"
                                    >
                                        Login Administrator
                                    </h3>

                                    <p
                                        class="mt-2
                                              text-slate-500"
                                        data-i18n="akunDilindungi"
                                    >
                                        Akun dilindungi dengan autentikasi.
                                    </p>

                                </div>

                                <span
                                    class="shrink-0
                                           px-4
                                           py-2
                                           rounded-full
                                           bg-green-100
                                           text-green-700
                                           font-semibold"
                                    data-i18n="aktif"
                                >
                                    Aktif
                                </span>

                            </div>


                            {{-- PASSWORD --}}

                            <div
                                class="flex
                                       items-center
                                       justify-between
                                       gap-4
                                       py-7
                                       border-t
                                       border-slate-200"
                            >

                                <div>

                                    <h3
                                        class="text-xl
                                               font-semibold
                                               text-slate-900"
                                        data-i18n="passwordProtection"
                                    >
                                        Password Protection
                                    </h3>

                                    <p
                                        class="mt-2
                                              text-slate-500"
                                        data-i18n="passwordKuat"
                                    >
                                        Gunakan password yang kuat.
                                    </p>

                                </div>

                                <span
                                    class="shrink-0
                                           px-4
                                           py-2
                                           rounded-full
                                           bg-green-100
                                           text-green-700
                                           font-semibold"
                                    data-i18n="aktif"
                                >
                                    Aktif
                                </span>

                            </div>


                            {{-- BUTTON --}}

                            <div
                                class="pt-7
                                       border-t
                                       border-slate-200"
                            >

                                <button
                                    type="button"
                                    onclick="openPasswordModal()"
                                    class="w-full
                                           px-6
                                           py-4
                                           rounded-xl
                                           border
                                           border-slate-300
                                           text-lg
                                           text-slate-800
                                           hover:bg-slate-50
                                           transition"
                                    data-i18n="kelolaKeamanan"
                                >

                                    Kelola Keamanan Akun

                                </button>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- NOTIFIKASI + PREFERENSI --}}

                <div class="grid
                            grid-cols-1
                            xl:grid-cols-2
                            gap-8
                            mb-8">


                    {{-- NOTIFIKASI --}}

                    <div
                        class="bg-white
                               rounded-2xl
                               border
                               border-slate-200
                               shadow-sm"
                    >

                        <div
                            class="p-7
                                   border-b
                                   border-slate-200"
                        >

                            <h2
                                class="text-2xl
                                       font-bold
                                       text-slate-900"
                                data-i18n="notifikasi"
                            >
                                Notifikasi
                            </h2>

                            <p
                                class="mt-2
                                      text-slate-500"
                                data-i18n="aturPengingat"
                            >
                                Atur pengingat kontrak.
                            </p>

                        </div>


                        <div class="p-7">

                            <form
                                action="{{ route('settings.reminder.update') }}"
                                method="POST"
                            >

                                @csrf

                                <div class="grid
                                            grid-cols-1
                                            md:grid-cols-2
                                            gap-5">


                                    <div>

                                        <label
                                            class="block
                                                   mb-2
                                                   font-semibold
                                                   text-slate-700"
                                        >
                                            Peringatan Kritis
                                        </label>

                                        <div class="relative">

                                            <input
                                                type="number"
                                                name="critical_days"
                                                min="1"
                                                value="{{ $criticalDays }}"
                                                class="w-full
                                                       px-4
                                                       py-3
                                                       rounded-xl
                                                       border
                                                       border-slate-300"
                                            >

                                            <span
                                                class="absolute
                                                       right-4
                                                       top-1/2
                                                       -translate-y-1/2
                                                       text-slate-400"
                                            >
                                                hari
                                            </span>

                                        </div>

                                    </div>


                                    <div>

                                        <label
                                            class="block
                                                   mb-2
                                                   font-semibold
                                                   text-slate-700"
                                        >
                                            Mendekati Habis
                                        </label>

                                        <div class="relative">

                                            <input
                                                type="number"
                                                name="near_days"
                                                min="2"
                                                value="{{ $nearDays }}"
                                                class="w-full
                                                       px-4
                                                       py-3
                                                       rounded-xl
                                                       border
                                                       border-slate-300"
                                            >

                                            <span
                                                class="absolute
                                                       right-4
                                                       top-1/2
                                                       -translate-y-1/2
                                                       text-slate-400"
                                            >
                                                hari
                                            </span>

                                        </div>

                                    </div>

                                </div>


                                <button
                                    type="submit"
                                    class="mt-6
                                           px-6
                                           py-3
                                           rounded-xl
                                           bg-blue-600
                                           text-white
                                           font-semibold
                                           hover:bg-blue-700"
                                >
                                    Simpan Pengaturan
                                </button>

                            </form>

                        </div>

                    </div>


                    {{-- PREFERENSI --}}

                    <div
                        class="bg-white
                               rounded-2xl
                               border
                               border-slate-200
                               shadow-sm"
                    >

                        <div
                            class="p-7
                                   border-b
                                   border-slate-200"
                        >

                            <h2
                                class="text-2xl
                                       font-bold
                                       text-slate-900"
                                data-i18n="preferensi"
                            >
                                Preferensi
                            </h2>

                            <p
                                class="mt-2
                                      text-slate-500"
                                data-i18n="preferensiPenggunaan"
                            >
                                Preferensi penggunaan LegalTrack.
                            </p>

                        </div>


                        <div class="p-7 space-y-6">


                            <div
                                class="flex
                                       items-center
                                       justify-between
                                       gap-4"
                            >

                                <div>

                                    <h3
                                        class="font-semibold
                                               text-slate-900"
                                    >
                                        Tampilkan Kontrak Terbaru
                                    </h3>

                                    <p class="text-sm
                                              text-slate-500
                                              mt-1">
                                        Tampilkan kontrak terbaru pada dashboard.
                                    </p>

                                </div>

                                <label class="relative inline-flex items-center cursor-pointer">

                                    <input
                                        type="checkbox"
                                        id="prefLatest"
                                        class="sr-only peer"
                                        checked
                                    >

                                    <div
                                        class="w-11
                                               h-6
                                               bg-slate-300
                                               peer-focus:outline-none
                                               rounded-full
                                               peer
                                               peer-checked:bg-blue-600
                                               after:content-['']
                                               after:absolute
                                               after:top-[2px]
                                               after:left-[2px]
                                               after:bg-white
                                               after:border-gray-300
                                               after:border
                                               after:rounded-full
                                               after:h-5
                                               after:w-5
                                               after:transition-all
                                               peer-checked:after:translate-x-full"
                                    ></div>

                                </label>

                            </div>


                            <div
                                class="flex
                                       items-center
                                       justify-between
                                       gap-4
                                       border-t
                                       border-slate-200
                                       pt-6"
                            >

                                <div>

                                    <h3
                                        class="font-semibold
                                               text-slate-900"
                                    >
                                        Tampilkan Status Pengingat
                                    </h3>

                                    <p class="text-sm
                                              text-slate-500
                                              mt-1">
                                        Tampilkan informasi pengingat kontrak.
                                    </p>

                                </div>

                                <label class="relative inline-flex items-center cursor-pointer">

                                    <input
                                        type="checkbox"
                                        id="prefReminder"
                                        class="sr-only peer"
                                        checked
                                    >

                                    <div
                                        class="w-11
                                               h-6
                                               bg-slate-300
                                               rounded-full
                                               peer
                                               peer-checked:bg-blue-600
                                               after:content-['']
                                               after:absolute
                                               after:top-[2px]
                                               after:left-[2px]
                                               after:bg-white
                                               after:border-gray-300
                                               after:border
                                               after:rounded-full
                                               after:h-5
                                               after:w-5
                                               after:transition-all
                                               peer-checked:after:translate-x-full"
                                    ></div>

                                </label>

                            </div>


                            <div
                                class="flex
                                       items-center
                                       justify-between
                                       gap-4
                                       border-t
                                       border-slate-200
                                       pt-6"
                            >

                                <div>

                                    <h3
                                        class="font-semibold
                                               text-slate-900"
                                    >
                                        Konfirmasi Sebelum Menghapus
                                    </h3>

                                    <p class="text-sm
                                              text-slate-500
                                              mt-1">
                                        Minta konfirmasi sebelum menghapus data.
                                    </p>

                                </div>

                                <label class="relative inline-flex items-center cursor-pointer">

                                    <input
                                        type="checkbox"
                                        id="prefDelete"
                                        class="sr-only peer"
                                        checked
                                    >

                                    <div
                                        class="w-11
                                               h-6
                                               bg-slate-300
                                               rounded-full
                                               peer
                                               peer-checked:bg-blue-600
                                               after:content-['']
                                               after:absolute
                                               after:top-[2px]
                                               after:left-[2px]
                                               after:bg-white
                                               after:border-gray-300
                                               after:border
                                               after:rounded-full
                                               after:h-5
                                               after:w-5
                                               after:transition-all
                                               peer-checked:after:translate-x-full"
                                    ></div>

                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- TENTANG LEGALTRACK --}}

                <div
                    class="bg-white
                           rounded-2xl
                           border
                           border-slate-200
                           shadow-sm"
                >

                    <div class="p-7">

                        <h2
                            class="text-2xl
                                   font-bold
                                   text-slate-900"
                            data-i18n="tentang"
                        >
                            Tentang LegalTrack
                        </h2>

                        <p
                            class="mt-3
                                  text-slate-500
                                  leading-relaxed"
                        >

                            LegalTrack merupakan sistem manajemen
                            kontrak terintegrasi yang digunakan
                            untuk membantu Legal Department
                            mengelola data kontrak, memantau
                            status kontrak, serta memberikan
                            pengingat berdasarkan tanggal
                            berakhirnya kontrak.

                        </p>

                        <div class="mt-6
                                    flex
                                    flex-wrap
                                    gap-3">

                            <span
                                class="px-4
                                       py-2
                                       rounded-full
                                       bg-blue-100
                                       text-blue-700
                                       text-sm
                                       font-semibold"
                            >
                                LegalTrack
                            </span>

                            <span
                                class="px-4
                                       py-2
                                       rounded-full
                                       bg-slate-100
                                       text-slate-700
                                       text-sm
                                       font-semibold"
                            >
                                Contract Management
                            </span>

                            <span
                                class="px-4
                                       py-2
                                       rounded-full
                                       bg-green-100
                                       text-green-700
                                       text-sm
                                       font-semibold"
                            >
                                Version 1.0
                            </span>

                        </div>

                    </div>

                </div>

            </section>

        </div>

    </main>

</div>


{{-- =========================================================
     PASSWORD MODAL
     ========================================================= --}}

<div
    id="passwordModal"
    class="fixed
           inset-0
           z-[100]
           hidden
           items-center
           justify-center
           p-4
           bg-black/50
           modal-overlay"
>

    <div
        class="w-full
               max-w-lg
               bg-white
               rounded-2xl
               shadow-2xl
               overflow-hidden"
    >

        <div
            class="p-6
                   border-b
                   border-slate-200
                   flex
                   items-center
                   justify-between"
        >

            <div>

                <h2
                    class="text-xl
                           font-bold
                           text-slate-900"
                >
                    Ubah Kata Sandi
                </h2>

                <p class="text-sm
                          text-slate-500
                          mt-1">
                    Masukkan kata sandi lama dan kata sandi baru.
                </p>

            </div>

            <button
                type="button"
                onclick="closePasswordModal()"
                class="w-10
                       h-10
                       rounded-xl
                       hover:bg-slate-100
                       text-slate-500"
            >

                ✕

            </button>

        </div>


        <form
            action="{{ route('settings.password.update') }}"
            method="POST"
            class="p-6"
        >

            @csrf

            @method('PUT')


            <div class="space-y-5">


                <div>

                    <label
                        class="block
                               mb-2
                               font-semibold
                               text-slate-700"
                    >
                        Kata Sandi Lama
                    </label>

                    <input
                        type="password"
                        name="current_password"
                        required
                        class="w-full
                               px-4
                               py-3
                               rounded-xl
                               border
                               border-slate-300
                               focus:outline-none
                               focus:ring-2
                               focus:ring-blue-500"
                    >

                </div>


                <div>

                    <label
                        class="block
                               mb-2
                               font-semibold
                               text-slate-700"
                    >
                        Kata Sandi Baru
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        minlength="8"
                        class="w-full
                               px-4
                               py-3
                               rounded-xl
                               border
                               border-slate-300
                               focus:outline-none
                               focus:ring-2
                               focus:ring-blue-500"
                    >

                </div>


                <div>

                    <label
                        class="block
                               mb-2
                               font-semibold
                               text-slate-700"
                    >
                        Konfirmasi Kata Sandi
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        required
                        minlength="8"
                        class="w-full
                               px-4
                               py-3
                               rounded-xl
                               border
                               border-slate-300
                               focus:outline-none
                               focus:ring-2
                               focus:ring-blue-500"
                    >

                </div>

            </div>


            <div class="mt-7
                        flex
                        justify-end
                        gap-3">

                <button
                    type="button"
                    onclick="closePasswordModal()"
                    class="px-5
                           py-3
                           rounded-xl
                           border
                           border-slate-300
                           text-slate-700"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="px-6
                           py-3
                           rounded-xl
                           bg-blue-600
                           text-white
                           font-semibold
                           hover:bg-blue-700"
                >
                    Simpan Kata Sandi
                </button>

            </div>

        </form>

    </div>

</div>


{{-- =========================================================
     JAVASCRIPT
     ========================================================= --}}

<script>

    /* =========================================================
       TRANSLATION
       ========================================================= */

    const translations = {

        id: {

            dashboard: "Dashboard",
            tambahKontrak: "Tambah Kontrak",
            daftarKontrak: "Daftar Kontrak",
            pengaturan: "Pengaturan",

            contractManagement:
                "Sistem Manajemen Kontrak Terintegrasi",

            legalDepartment:
                "Legal Department",

            akunAdministrator:
                "Akun Administrator",

            pengaturanAkun:
                "Kelola informasi akun administrator.",

            nama: "Nama",
            email: "Email",

            simpanPerubahan:
                "Simpan Perubahan",

            ubahKataSandi:
                "Ubah Kata Sandi",

            lupaKataSandi:
                "Lupa Kata Sandi",

            tampilan:
                "Tampilan",

            aturTampilan:
                "Atur tampilan aplikasi sesuai kebutuhan.",

            tema:
                "Tema",

            terang:
                "Terang",

            gelap:
                "Gelap",

            pilihTema:
                "Pilih tema tampilan LegalTrack.",

            ubahBahasa:
                "Ubah Bahasa",

            indonesia:
                "ID Indonesia",

            inggris:
                "EN English",

            bahasaDigunakan:
                "Bahasa yang digunakan pada aplikasi.",

            keamanan:
                "Keamanan",

            pengaturanKeamanan:
                "Pengaturan keamanan akun.",

            loginAdministrator:
                "Login Administrator",

            akunDilindungi:
                "Akun dilindungi dengan autentikasi.",

            passwordProtection:
                "Password Protection",

            passwordKuat:
                "Gunakan password yang kuat.",

            aktif:
                "Aktif",

            kelolaKeamanan:
                "Kelola Keamanan Akun",

            notifikasi:
                "Notifikasi",

            aturPengingat:
                "Atur pengingat kontrak.",

            preferensi:
                "Preferensi",

            preferensiPenggunaan:
                "Preferensi penggunaan LegalTrack.",

            tentang:
                "Tentang LegalTrack",

            chartKategoriTitle:
                "Distribusi Kategori Kontrak",

            chartKategoriDesc:
                "Proporsi kontrak berdasarkan kategori",

            chartOmsetTitle:
                "Grafik Total Nilai Omset",

            chartOmsetDesc:
                "Akumulasi perolehan nilai kontrak",

            tampilkanPerHalaman:
                "Tampilkan:",

            ditemukanTotal:
                "Total ditemukan:",

            kontrak:
                "kontrak",

            sebelumnya:
                "Sebelumnya",

            berikutnya:
                "Berikutnya",

            menampilkan:
                "Menampilkan",

            sampai:
                "sampai",

            dari:
                "dari"

        },


        en: {

            dashboard:
                "Dashboard",

            tambahKontrak:
                "Add Contract",

            daftarKontrak:
                "Contract List",

            pengaturan:
                "Settings",

            contractManagement:
                "Integrated Contract Management System",

            legalDepartment:
                "Legal Department",

            akunAdministrator:
                "Administrator Account",

            pengaturanAkun:
                "Manage administrator account information.",

            nama:
                "Name",

            email:
                "Email",

            simpanPerubahan:
                "Save Changes",

            ubahKataSandi:
                "Change Password",

            lupaKataSandi:
                "Forgot Password",

            tampilan:
                "Appearance",

            aturTampilan:
                "Customize the application appearance.",

            tema:
                "Theme",

            terang:
                "Light",

            gelap:
                "Dark",

            pilihTema:
                "Choose the LegalTrack appearance theme.",

            ubahBahasa:
                "Language",

            indonesia:
                "ID Indonesian",

            inggris:
                "EN English",

            bahasaDigunakan:
                "Language used by the application.",

            keamanan:
                "Security",

            pengaturanKeamanan:
                "Account security settings.",

            loginAdministrator:
                "Administrator Login",

            akunDilindungi:
                "Account protected with authentication.",

            passwordProtection:
                "Password Protection",

            passwordKuat:
                "Use a strong password.",

            aktif:
                "Active",

            kelolaKeamanan:
                "Manage Account Security",

            notifikasi:
                "Notifications",

            aturPengingat:
                "Manage contract reminders.",

            preferensi:
                "Preferences",

            preferensiPenggunaan:
                "LegalTrack usage preferences.",

            tentang:
                "About LegalTrack",

            chartKategoriTitle:
                "Contract Category Distribution",

            chartKategoriDesc:
                "Contract proportions by category",

            chartOmsetTitle:
                "Total Revenue Chart",

            chartOmsetDesc:
                "Accumulated contract value revenue",

            tampilkanPerHalaman:
                "Show:",

            ditemukanTotal:
                "Total found:",

            kontrak:
                "contracts",

            sebelumnya:
                "Previous",

            berikutnya:
                "Next",

            menampilkan:
                "Showing",

            sampai:
                "to",

            dari:
                "of"

        }

    };


    /* =========================================================
       THEME
       ========================================================= */

    function initializeTheme()
    {

        const themeSelect =
            document.getElementById(
                'themeSelect'
            );


        if (!themeSelect) {
            return;
        }


        const savedTheme =
            localStorage.getItem(
                'legaltrack_theme'
            ) || 'light';


        themeSelect.value =
            savedTheme;


        applyTheme(
            savedTheme
        );


        themeSelect.addEventListener(
            'change',
            function()
            {

                const theme =
                    this.value;


                localStorage.setItem(
                    'legaltrack_theme',
                    theme
                );


                applyTheme(
                    theme
                );

            }
        );

    }


    function applyTheme(theme)
    {

        const html =
            document.documentElement;


        if (theme === 'dark') {

            html.classList.add(
                'theme-dark'
            );

        } else {

            html.classList.remove(
                'theme-dark'
            );

        }

        if (typeof categoryChartInstance !== 'undefined' && categoryChartInstance) {
            categoryChartInstance.data.datasets[0].borderColor = (theme === 'dark') ? '#1e293b' : '#ffffff';
            categoryChartInstance.update();
        }
        if (typeof renderOmsetChart === 'function') {
            renderOmsetChart();
        }

    }


    /* =========================================================
       LANGUAGE
       ========================================================= */

    function initializeLanguage()
    {

        const languageSelect =
            document.getElementById(
                'languageSelect'
            );


        if (!languageSelect) {
            return;
        }


        const savedLanguage =
            localStorage.getItem(
                'legaltrack_language'
            ) || 'id';


        languageSelect.value =
            savedLanguage;


        applyLanguage(
            savedLanguage
        );


        languageSelect.addEventListener(
            'change',
            function()
            {

                const language =
                    this.value;


                localStorage.setItem(
                    'legaltrack_language',
                    language
                );


                applyLanguage(
                    language
                );


                Swal.fire({

                    icon: 'success',

                    title:
                        language === 'en'
                            ? 'Language Changed'
                            : 'Bahasa Berhasil Diubah',

                    text:
                        language === 'en'
                            ? 'The LegalTrack language has been updated.'
                            : 'Bahasa LegalTrack berhasil diperbarui.',

                    timer: 1300,

                    showConfirmButton: false

                });

            }
        );

    }


    function applyLanguage(language)
    {

        const selectedLanguage =
            translations[language] ||
            translations.id;


        document
            .querySelectorAll(
                '[data-i18n]'
            )
            .forEach(
                function(element)
                {

                    const key =
                        element.getAttribute(
                            'data-i18n'
                        );


                    if (
                        selectedLanguage[key] !== undefined
                    ) {

                        element.textContent =
                            selectedLanguage[key];

                    }

                }
            );

    }


    /* =========================================================
       PAGE NAVIGATION
       ========================================================= */

    function showPage(page)
    {

        document
            .querySelectorAll(
                '.page-section'
            )
            .forEach(
                function(section)
                {

                    section.classList.add(
                        'hidden'
                    );

                }
            );


        const target =
            document.getElementById(
                'page-' + page
            );


        if (!target) {
            return;
        }


        target.classList.remove(
            'hidden'
        );


        document
            .querySelectorAll(
                '.nav-item'
            )
            .forEach(
                function(item)
                {

                    item.classList.remove(
                        'bg-blue-600',
                        'text-white'
                    );

                    item.classList.add(
                        'text-slate-300'
                    );

                }
            );


        const activeNav =
            document.querySelector(
                '.nav-item[data-page="' +
                page +
                '"]'
            );


        if (activeNav) {

            activeNav.classList.remove(
                'text-slate-300'
            );

            activeNav.classList.add(
                'bg-blue-600',
                'text-white'
            );

        }


        const titles = {

            dashboard: {
                title: 'Dashboard',
                subtitle:
                    'Sistem Manajemen Kontrak Terintegrasi'
            },

            tambah: {
                title: 'Tambah Kontrak',
                subtitle:
                    'Tambahkan data kontrak baru'
            },

            daftar: {
                title: 'Daftar Kontrak',
                subtitle:
                    'Kelola seluruh data kontrak'
            },

            pengaturan: {
                title: 'Pengaturan',
                subtitle:
                    'Sistem Manajemen Kontrak Terintegrasi'
            }

        };


        if (titles[page]) {

            document.getElementById(
                'pageTitle'
            ).textContent =
                titles[page].title;


            document.getElementById(
                'pageSubtitle'
            ).textContent =
                titles[page].subtitle;

        }


        if (
            page === 'tambah' ||
            page === 'daftar' ||
            page === 'pengaturan'
        ) {

            closeSidebar();

        }

    }


    /* =========================================================
       HASH NAVIGATION
       ========================================================= */

    function openPageFromHash()
    {

        const hash =
            window.location.hash
                .replace('#', '');


        if (
            hash === 'tambah' ||
            hash === 'daftar' ||
            hash === 'pengaturan'
        ) {

            showPage(hash);

        } else {

            showPage('dashboard');

        }

    }


    /* =========================================================
       SIDEBAR MOBILE
       ========================================================= */

    function openSidebar()
    {

        document
            .getElementById('sidebar')
            .classList.add(
                'sidebar-open'
            );


        document
            .getElementById('sidebarOverlay')
            .classList.add(
                'active'
            );

    }


    function closeSidebar()
    {

        document
            .getElementById('sidebar')
            .classList.remove(
                'sidebar-open'
            );


        document
            .getElementById('sidebarOverlay')
            .classList.remove(
                'active'
            );

    }


    /* =========================================================
       CHARTS (CHART.JS)
       ========================================================= */

    let categoryChartInstance = null;
    let omsetChartInstance = null;
    let currentOmsetMode = 'monthly';

    const categoryStatsData = @json($categoryStats ?? []);
    const monthlyOmsetData = @json($monthlyOmset ?? []);
    const categoryOmsetData = @json($categoryOmset ?? []);

    function initializeCharts()
    {
        const isDark = document.documentElement.classList.contains('theme-dark');
        const borderColor = isDark ? '#1e293b' : '#ffffff';

        // 1. CATEGORY PIE CHART (HANYA SATU PIE CHART)
        const categoryCanvas = document.getElementById('categoryPieChart');
        const categoryLegendList = document.getElementById('categoryLegendList');

        if (categoryCanvas && Object.keys(categoryStatsData).length > 0) {
            const catLabels = Object.keys(categoryStatsData);
            const catValues = Object.values(categoryStatsData);
            const totalCat = catValues.reduce((a, b) => a + b, 0);

            const categoryColors = {
                'Karyawan': '#3b82f6',
                'Vendor': '#10b981',
                'Sub-kontraktor': '#8b5cf6',
                'Klien': '#f59e0b'
            };
            const defaultCatPalette = ['#06b6d4', '#ec4899', '#f97316', '#64748b', '#14b8a6', '#6366f1'];

            const bgColors = catLabels.map((cat, idx) => {
                return categoryColors[cat] || defaultCatPalette[idx % defaultCatPalette.length];
            });

            if (categoryChartInstance) {
                categoryChartInstance.destroy();
            }

            categoryChartInstance = new Chart(categoryCanvas, {
                type: 'pie',
                data: {
                    labels: catLabels,
                    datasets: [{
                        data: catValues,
                        backgroundColor: bgColors,
                        borderColor: borderColor,
                        borderWidth: 2,
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const val = context.parsed || 0;
                                    const pct = totalCat > 0 ? ((val / totalCat) * 100).toFixed(1) : 0;
                                    return ` ${context.label}: ${val} kontrak (${pct}%)`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            });

            if (categoryLegendList) {
                categoryLegendList.innerHTML = '';
                catLabels.forEach((label, idx) => {
                    const val = catValues[idx];
                    const pct = totalCat > 0 ? ((val / totalCat) * 100).toFixed(1) : 0;
                    const color = bgColors[idx];

                    const item = document.createElement('div');
                    item.className = 'flex items-center justify-between p-2.5 rounded-xl bg-slate-50 border border-slate-100 hover:bg-slate-100/80 transition';
                    item.innerHTML = `
                        <div class="flex items-center gap-2.5 min-w-0">
                            <span class="w-3 h-3 rounded-full flex-shrink-0" style="background-color: ${color}"></span>
                            <span class="text-xs font-semibold text-slate-700 truncate">${label}</span>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <span class="text-xs font-bold text-slate-900">${val}</span>
                            <span class="text-[11px] font-medium text-slate-500 bg-white px-2 py-0.5 rounded-md border border-slate-200">${pct}%</span>
                        </div>
                    `;
                    categoryLegendList.appendChild(item);
                });
            }
        }

        // 2. GRAFIK TOTAL NILAI OMSET
        renderOmsetChart();
    }

    function renderOmsetChart()
    {
        const omsetCanvas = document.getElementById('omsetBarChart');
        if (!omsetCanvas) return;

        const isDark = document.documentElement.classList.contains('theme-dark');
        const textColor = isDark ? '#94a3b8' : '#64748b';
        const gridColor = isDark ? 'rgba(51, 65, 85, 0.4)' : 'rgba(226, 232, 240, 0.7)';

        let labels = [];
        let values = [];
        let barColors = [];

        if (currentOmsetMode === 'monthly') {
            labels = Object.keys(monthlyOmsetData);
            values = Object.values(monthlyOmsetData);
            barColors = '#3b82f6';
        } else {
            labels = Object.keys(categoryOmsetData);
            values = Object.values(categoryOmsetData);
            const categoryColors = {
                'Karyawan': '#3b82f6',
                'Vendor': '#10b981',
                'Sub-kontraktor': '#8b5cf6',
                'Klien': '#f59e0b'
            };
            const defaultCatPalette = ['#06b6d4', '#ec4899', '#f97316', '#64748b'];
            barColors = labels.map((cat, idx) => categoryColors[cat] || defaultCatPalette[idx % defaultCatPalette.length]);
        }

        if (omsetChartInstance) {
            omsetChartInstance.destroy();
        }

        omsetChartInstance = new Chart(omsetCanvas, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Nilai Omset (Rp)',
                    data: values,
                    backgroundColor: barColors,
                    borderRadius: 8,
                    borderSkipped: false,
                    maxBarThickness: 34
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const val = context.parsed.y || 0;
                                return ' Omset: Rp ' + new Intl.NumberFormat('id-ID').format(val);
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: textColor,
                            font: {
                                size: 11,
                                weight: '500'
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: gridColor
                        },
                        ticks: {
                            color: textColor,
                            font: {
                                size: 10
                            },
                            callback: function(val) {
                                if (val >= 1000000000) return (val / 1000000000).toFixed(1) + ' M';
                                if (val >= 1000000) return (val / 1000000).toFixed(0) + ' Jt';
                                if (val >= 1000) return (val / 1000).toFixed(0) + ' Rb';
                                return val;
                            }
                        }
                    }
                },
                animation: {
                    duration: 500,
                    easing: 'easeOutQuart'
                }
            }
        });
    }

    function switchOmsetChartMode(mode)
    {
        currentOmsetMode = mode;
        const btnMonthly = document.getElementById('btnOmsetMonthly');
        const btnCategory = document.getElementById('btnOmsetCategory');

        if (btnMonthly && btnCategory) {
            if (mode === 'monthly') {
                btnMonthly.className = 'px-3 py-1 text-xs font-semibold rounded-lg bg-white text-blue-600 shadow-sm transition';
                btnCategory.className = 'px-3 py-1 text-xs font-semibold rounded-lg text-slate-600 hover:text-slate-900 transition';
            } else {
                btnCategory.className = 'px-3 py-1 text-xs font-semibold rounded-lg bg-white text-blue-600 shadow-sm transition';
                btnMonthly.className = 'px-3 py-1 text-xs font-semibold rounded-lg text-slate-600 hover:text-slate-900 transition';
            }
        }

        renderOmsetChart();
    }


    /* =========================================================
       CONTRACT PAGINATION & FILTER
       ========================================================= */

    let currentContractPage = 1;
    let contractPerPage = 10;
    let matchingContractRows = [];

    function filterContracts()
    {

        const searchInput =
            document.getElementById(
                'contractSearch'
            );

        const kategori =
            document.getElementById(
                'filterKategori'
            );

        const status =
            document.getElementById(
                'filterStatus'
            );

        const reminder =
            document.getElementById(
                'filterReminder'
            );

        const rows =
            Array.from(document.querySelectorAll(
                '.contract-row'
            ));

        const filteredCountBadge =
            document.getElementById(
                'filteredCountBadge'
            );

        if (
            !searchInput ||
            !kategori ||
            !status ||
            !reminder
        ) {
            return;
        }

        const search =
            searchInput.value
                .toLowerCase()
                .trim();

        matchingContractRows = [];

        rows.forEach(
            function(row)
            {

                const rowSearch =
                    row.dataset.search || '';

                const rowKategori =
                    row.dataset.kategori || '';

                const rowStatus =
                    row.dataset.status || '';

                const rowReminder =
                    row.dataset.reminder || '';

                const matchSearch =
                    rowSearch.includes(
                        search
                    );

                const matchKategori =
                    !kategori.value ||
                    rowKategori ===
                    kategori.value;

                const matchStatus =
                    !status.value ||
                    rowStatus ===
                    status.value;

                const matchReminder =
                    !reminder.value ||
                    rowReminder ===
                    reminder.value;

                if (
                    matchSearch &&
                    matchKategori &&
                    matchStatus &&
                    matchReminder
                ) {
                    matchingContractRows.push(row);
                }

            }
        );

        if (filteredCountBadge) {
            filteredCountBadge.textContent =
                matchingContractRows.length;
        }

        currentContractPage = 1;
        renderContractPagination();

    }

    function renderContractPagination()
    {

        const rows =
            Array.from(document.querySelectorAll(
                '.contract-row'
            ));

        const emptyRow =
            document.getElementById(
                'emptyFilterRow'
            );

        const pageStartNum =
            document.getElementById(
                'pageStartNum'
            );

        const pageEndNum =
            document.getElementById(
                'pageEndNum'
            );

        const pageTotalNum =
            document.getElementById(
                'pageTotalNum'
            );

        const pageNumberList =
            document.getElementById(
                'pageNumberList'
            );

        const prevPageBtn =
            document.getElementById(
                'prevPageBtn'
            );

        const nextPageBtn =
            document.getElementById(
                'nextPageBtn'
            );

        const totalMatching =
            matchingContractRows.length;

        if (totalMatching === 0) {

            rows.forEach(function(r) {
                r.classList.add('hidden');
            });

            if (emptyRow && rows.length > 0) {
                emptyRow.classList.remove(
                    'hidden'
                );
            }

            if (pageStartNum) pageStartNum.textContent = 0;
            if (pageEndNum) pageEndNum.textContent = 0;
            if (pageTotalNum) pageTotalNum.textContent = 0;
            if (pageNumberList) pageNumberList.innerHTML = '';
            if (prevPageBtn) prevPageBtn.disabled = true;
            if (nextPageBtn) nextPageBtn.disabled = true;

            return;

        }

        if (emptyRow) {
            emptyRow.classList.add('hidden');
        }

        const perPageVal =
            contractPerPage === 'all'
                ? totalMatching
                : parseInt(contractPerPage, 10);

        const totalPages =
            Math.ceil(totalMatching / perPageVal) || 1;

        if (currentContractPage > totalPages) {
            currentContractPage = totalPages;
        }

        if (currentContractPage < 1) {
            currentContractPage = 1;
        }

        const startIndex =
            (currentContractPage - 1) * perPageVal;

        const endIndex =
            Math.min(startIndex + perPageVal, totalMatching);

        // Sembunyikan seluruh row dan hanya tampilkan row halaman aktif
        rows.forEach(function(r) {
            r.classList.add('hidden');
        });

        for (let i = startIndex; i < endIndex; i++) {
            if (matchingContractRows[i]) {
                matchingContractRows[i].classList.remove(
                    'hidden'
                );
            }
        }

        if (pageStartNum) {
            pageStartNum.textContent =
                totalMatching > 0 ? (startIndex + 1) : 0;
        }

        if (pageEndNum) {
            pageEndNum.textContent =
                endIndex;
        }

        if (pageTotalNum) {
            pageTotalNum.textContent =
                totalMatching;
        }

        if (prevPageBtn) {
            prevPageBtn.disabled =
                (currentContractPage === 1);
        }

        if (nextPageBtn) {
            nextPageBtn.disabled =
                (currentContractPage === totalPages);
        }

        // Render nomor halaman
        if (pageNumberList) {

            pageNumberList.innerHTML = '';

            let pagesToRender = [];

            if (totalPages <= 7) {

                for (let i = 1; i <= totalPages; i++) {
                    pagesToRender.push(i);
                }

            } else {

                if (currentContractPage <= 4) {

                    pagesToRender = [1, 2, 3, 4, 5, '...', totalPages];

                } else if (currentContractPage >= totalPages - 3) {

                    pagesToRender = [
                        1,
                        '...',
                        totalPages - 4,
                        totalPages - 3,
                        totalPages - 2,
                        totalPages - 1,
                        totalPages
                    ];

                } else {

                    pagesToRender = [
                        1,
                        '...',
                        currentContractPage - 1,
                        currentContractPage,
                        currentContractPage + 1,
                        '...',
                        totalPages
                    ];

                }

            }

            pagesToRender.forEach(function(p) {

                if (p === '...') {

                    const dots = document.createElement('span');
                    dots.className =
                        'px-2 py-1 text-slate-400 text-sm font-semibold select-none';
                    dots.textContent = '...';
                    pageNumberList.appendChild(dots);

                } else {

                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.textContent = p;

                    if (p === currentContractPage) {

                        btn.className =
                            'w-9 h-9 rounded-xl bg-blue-600 text-white font-semibold text-sm shadow-sm flex items-center justify-center transition';

                    } else {

                        btn.className =
                            'w-9 h-9 rounded-xl border border-slate-200 bg-white text-slate-700 hover:bg-slate-50 font-medium text-sm transition flex items-center justify-center';

                        btn.addEventListener('click', function() {
                            currentContractPage = p;
                            renderContractPagination();
                        });

                    }

                    pageNumberList.appendChild(btn);

                }

            });

        }

    }

    function initializePaginationEvents()
    {

        const perPageSelect =
            document.getElementById(
                'perPageSelect'
            );

        const prevPageBtn =
            document.getElementById(
                'prevPageBtn'
            );

        const nextPageBtn =
            document.getElementById(
                'nextPageBtn'
            );

        if (perPageSelect) {

            perPageSelect.addEventListener(
                'change',
                function()
                {

                    contractPerPage = this.value;
                    currentContractPage = 1;
                    renderContractPagination();

                }
            );

        }

        if (prevPageBtn) {

            prevPageBtn.addEventListener(
                'click',
                function()
                {

                    if (currentContractPage > 1) {
                        currentContractPage--;
                        renderContractPagination();
                    }

                }
            );

        }

        if (nextPageBtn) {

            nextPageBtn.addEventListener(
                'click',
                function()
                {

                    const perPageVal =
                        contractPerPage === 'all'
                            ? matchingContractRows.length
                            : parseInt(contractPerPage, 10);

                    const totalPages =
                        Math.ceil(matchingContractRows.length / perPageVal) || 1;

                    if (currentContractPage < totalPages) {
                        currentContractPage++;
                        renderContractPagination();
                    }

                }
            );

        }

    }


    /* =========================================================
       DELETE CONFIRMATION
       ========================================================= */

    function setupDeleteConfirmation()
    {

        document
            .querySelectorAll(
                '.delete-form'
            )
            .forEach(
                function(form)
                {

                    form.addEventListener(
                        'submit',
                        function(event)
                        {

                            event.preventDefault();


                            Swal.fire({

                                title:
                                    'Hapus kontrak?',

                                text:
                                    'Data kontrak yang dihapus tidak dapat dikembalikan.',

                                icon:
                                    'warning',

                                showCancelButton:
                                    true,

                                confirmButtonColor:
                                    '#dc2626',

                                cancelButtonColor:
                                    '#64748b',

                                confirmButtonText:
                                    'Ya, Hapus',

                                cancelButtonText:
                                    'Batal'

                            }).then(
                                function(result)
                                {

                                    if (
                                        result.isConfirmed
                                    ) {

                                        form.submit();

                                    }

                                }
                            );

                        }
                    );

                }
            );

    }


    /* =========================================================
       PASSWORD MODAL
       ========================================================= */

    function openPasswordModal()
    {

        const modal =
            document.getElementById(
                'passwordModal'
            );


        if (!modal) {
            return;
        }


        modal.classList.remove(
            'hidden'
        );

        modal.classList.add(
            'flex'
        );

    }


    function closePasswordModal()
    {

        const modal =
            document.getElementById(
                'passwordModal'
            );


        if (!modal) {
            return;
        }


        modal.classList.add(
            'hidden'
        );

        modal.classList.remove(
            'flex'
        );

    }


    /* =========================================================
       FORGOT PASSWORD
       ========================================================= */

    function forgotPassword()
    {

        const language =
            localStorage.getItem(
                'legaltrack_language'
            ) || 'id';


        Swal.fire({

            icon: 'info',

            title:
                language === 'en'
                    ? 'Forgot Password'
                    : 'Lupa Kata Sandi',

            text:
                language === 'en'
                    ? 'Please contact the LegalTrack administrator to reset your password.'
                    : 'Silakan hubungi administrator LegalTrack untuk melakukan reset kata sandi.',

            confirmButtonText:
                'OK'

        });

    }


    /* =========================================================
       DATE
       ========================================================= */

    function updateCurrentDate()
    {

        const dateElement =
            document.getElementById(
                'currentDate'
            );


        if (!dateElement) {
            return;
        }


        const today =
            new Date();


        const language =
            localStorage.getItem(
                'legaltrack_language'
            ) || 'id';


        const locale =
            language === 'en'
                ? 'en-US'
                : 'id-ID';


        dateElement.textContent =
            today.toLocaleDateString(
                locale,
                {
                    weekday: 'long',
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }
            );

    }


    /* =========================================================
       RUPIAH FORMAT
       ========================================================= */

    function initializeCurrency()
    {

        const input =
            document.getElementById(
                'nilaiKontrak'
            );


        if (!input) {
            return;
        }


        input.addEventListener(
            'input',
            function()
            {

                let value =
                    this.value
                        .replace(/\D/g, '');


                if (!value) {

                    this.value = '';

                    return;

                }


                this.value =
                    new Intl.NumberFormat(
                        'id-ID'
                    ).format(
                        Number(value)
                    );

            }
        );


        const form =
            input.closest('form');


        if (form) {

            form.addEventListener(
                'submit',
                function()
                {

                    input.value =
                        input.value
                            .replace(/\./g, '')
                            .replace(/,/g, '');

                }
            );

        }

    }


    /* =========================================================
       PREFERENCES
       ========================================================= */

    function initializePreferences()
    {

        const preferences = [
            'prefLatest',
            'prefReminder',
            'prefDelete'
        ];


        preferences.forEach(
            function(id)
            {

                const element =
                    document.getElementById(id);


                if (!element) {
                    return;
                }


                const saved =
                    localStorage.getItem(
                        'legaltrack_' + id
                    );


                if (saved !== null) {

                    element.checked =
                        saved === 'true';

                }


                element.addEventListener(
                    'change',
                    function()
                    {

                        localStorage.setItem(
                            'legaltrack_' + id,
                            this.checked
                        );

                    }
                );

            }
        );

    }


    /* =========================================================
       SUCCESS ALERT
       ========================================================= */

    function showSuccessAlert()
    {

        @if(session('success'))

            Swal.fire({

                icon: 'success',

                title: 'Berhasil',

                text: @json(session('success')),

                timer: 1800,

                showConfirmButton: false

            });

        @endif

    }


    /* =========================================================
       VALIDATION ERROR
       ========================================================= */

    function showValidationErrors()
    {

        @if($errors->any())

            Swal.fire({

                icon: 'error',

                title: 'Terjadi Kesalahan',

                html: @json(
                    implode(
                        '<br>',
                        $errors->all()
                    )
                )

            });

        @endif

    }


    /* =========================================================
       DOM READY
       ========================================================= */

    document.addEventListener(
        'DOMContentLoaded',
        function()
        {

            openPageFromHash();

            initializeTheme();

            initializeLanguage();

            initializeCurrency();

            initializePreferences();

            updateCurrentDate();

            initializeCharts();

            filterContracts();

            initializePaginationEvents();

            setupDeleteConfirmation();

            showSuccessAlert();

            showValidationErrors();

        }
    );


    /* =========================================================
       HASH CHANGE
       ========================================================= */

    window.addEventListener(
        'hashchange',
        function()
        {

            openPageFromHash();

        }
    );


    /* =========================================================
       FILTER EVENTS
       ========================================================= */

    document.addEventListener(
        'DOMContentLoaded',
        function()
        {

            const filterIds = [

                'contractSearch',
                'filterKategori',
                'filterStatus',
                'filterReminder'

            ];


            filterIds.forEach(
                function(id)
                {

                    const element =
                        document.getElementById(id);


                    if (element) {

                        element.addEventListener(
                            'input',
                            filterContracts
                        );

                        element.addEventListener(
                            'change',
                            filterContracts
                        );

                    }

                }
            );

        }
    );


    /* =========================================================
       CLOSE MODAL WITH ESC
       ========================================================= */

    document.addEventListener(
        'keydown',
        function(event)
        {

            if (event.key === 'Escape') {

                closePasswordModal();

            }

        }
    );


    /* =========================================================
       CLOSE MODAL CLICK OUTSIDE
       ========================================================= */

    document
        .getElementById('passwordModal')
        ?.addEventListener(
            'click',
            function(event)
            {

                if (
                    event.target === this
                ) {

                    closePasswordModal();

                }

            }
        );

</script>

</body>

</html>