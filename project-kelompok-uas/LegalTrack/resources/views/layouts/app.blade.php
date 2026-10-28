<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'LegalTrack')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    @yield('head')
</head>

<body class="bg-slate-50 text-slate-700">

<div class="min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#111827] text-white fixed left-0 top-0 bottom-0">

        <!-- LOGO -->
        <div class="h-20 flex items-center px-6 border-b border-slate-700/50">

            <div class="w-9 h-9 rounded-lg bg-sky-400 flex items-center justify-center mr-3">
                📋
            </div>

            <span class="text-lg font-bold">
                LegalTrack
            </span>

        </div>


        <!-- MENU -->
        <nav class="px-3 py-5 space-y-2">

            <!-- DASHBOARD -->
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('dashboard') ? 'bg-[#1e293b] text-white' : 'text-slate-300 hover:bg-slate-800' }}">

                @if(request()->routeIs('dashboard'))
                    <span class="w-1 h-6 bg-sky-400 rounded-full"></span>
                @endif

                <span>🏠</span>

                <span class="text-sm">
                    Dasbor
                </span>

            </a>


            <!-- TAMBAH KONTRAK -->
            <a href="{{ route('contracts.create') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('contracts.create') ? 'bg-[#1e293b] text-white' : 'text-slate-300 hover:bg-slate-800' }}">

                @if(request()->routeIs('contracts.create'))
                    <span class="w-1 h-6 bg-sky-400 rounded-full"></span>
                @endif

                <span>➕</span>

                <span class="text-sm">
                    Tambah Kontrak
                </span>

            </a>


            <!-- DAFTAR KONTRAK -->
            <a href="{{ route('contracts.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('contracts.index') || request()->routeIs('contracts.show') || request()->routeIs('contracts.edit') ? 'bg-[#1e293b] text-white' : 'text-slate-300 hover:bg-slate-800' }}">

                @if(request()->routeIs('contracts.index') || request()->routeIs('contracts.show') || request()->routeIs('contracts.edit'))
                    <span class="w-1 h-6 bg-sky-400 rounded-full"></span>
                @endif

                <span>📄</span>

                <span class="text-sm">
                    Daftar Kontrak
                </span>

            </a>


            <!-- PENGATURAN -->
            <a href="{{ route('settings') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
               {{ request()->routeIs('settings') ? 'bg-[#1e293b] text-white' : 'text-slate-300 hover:bg-slate-800' }}">

                @if(request()->routeIs('settings'))
                    <span class="w-1 h-6 bg-sky-400 rounded-full"></span>
                @endif

                <span>⚙️</span>

                <span class="text-sm">
                    Pengaturan
                </span>

            </a>

        </nav>


        <!-- VERSION -->
        <div class="absolute bottom-8 left-5">

            <p class="text-[10px] text-slate-400">
                Sistem Kelola Kontrak
            </p>

            <p class="text-xs font-semibold">
                v2.1.0 Enterprise
            </p>

        </div>

    </aside>


    <!-- CONTENT -->
    <main class="ml-64 flex-1 min-h-screen">

        @yield('content')

    </main>

</div>

@yield('scripts')

</body>
</html>