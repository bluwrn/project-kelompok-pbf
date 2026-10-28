<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Kontrak - LegalTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-700">

<div class="min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#111827] text-white fixed left-0 top-0 bottom-0">

        <div class="h-20 flex items-center px-6 border-b border-slate-700/50">

            <div class="w-9 h-9 rounded-lg bg-sky-400 flex items-center justify-center mr-3">
                📋
            </div>

            <span class="text-lg font-bold">
                LegalTrack
            </span>

        </div>


        <nav class="px-3 py-5 space-y-2">

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800">
                🏠
                <span class="text-sm">Dasbor</span>
            </a>

            <a href="{{ route('contracts.create') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800">
                ➕
                <span class="text-sm">Tambah Kontrak</span>
            </a>

            <a href="{{ route('contracts.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#1e293b] text-white">

                <span class="w-1 h-6 bg-sky-400 rounded-full"></span>

                📄
                <span class="text-sm font-medium">
                    Daftar Kontrak
                </span>

            </a>

            <a href="{{ route('settings') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800">
                ⚙️
                <span class="text-sm">Pengaturan</span>
            </a>

        </nav>


        <div class="absolute bottom-8 left-5">
            <p class="text-[10px] text-slate-400">
                Sistem Kelola Kontrak
            </p>

            <p class="text-xs font-semibold">
                v2.1.0 Enterprise
            </p>
        </div>

    </aside>


    <!-- MAIN -->
    <main class="ml-64 flex-1">

        <div class="px-8 py-7">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-7">

                <div>
                    <h1 class="text-2xl font-bold text-slate-800">
                        Daftar Kontrak
                    </h1>

                    <p class="text-sm text-slate-400 mt-1">
                        Kelola seluruh data kontrak yang tersimpan di LegalTrack.
                    </p>
                </div>

                <a href="{{ route('contracts.create') }}"
                   class="bg-sky-500 hover:bg-sky-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium">
                    + Tambah Kontrak
                </a>

            </div>


            <!-- SUCCESS -->
            @if(session('success'))

                <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 px-5 py-4 rounded-xl mb-6 text-sm">
                    ✓ {{ session('success') }}
                </div>

            @endif


            <!-- FILTER -->
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 mb-6">

                <form method="GET"
                      action="{{ route('contracts.index') }}">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        <!-- SEARCH -->
                        <div class="md:col-span-2">

                            <label class="block text-xs font-medium text-slate-500 mb-2">
                                Cari Kontrak
                            </label>

                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Cari kode, judul, atau pihak..."
                                   class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm outline-none focus:ring-2 focus:ring-sky-400">

                        </div>


                        <!-- KATEGORI -->
                        <div>

                            <label class="block text-xs font-medium text-slate-500 mb-2">
                                Kategori
                            </label>

                            <select name="kategori"
                                    class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm outline-none">

                                <option value="">
                                    Semua Kategori
                                </option>

                                @foreach(['Karyawan','Vendor','Sub-kontraktor','Klien'] as $kategori)

                                    <option value="{{ $kategori }}"
                                        {{ request('kategori') == $kategori ? 'selected' : '' }}>
                                        {{ $kategori }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <!-- STATUS -->
                        <div>

                            <label class="block text-xs font-medium text-slate-500 mb-2">
                                Status
                            </label>

                            <select name="status"
                                    class="w-full border border-slate-300 rounded-lg px-4 py-2.5 text-sm outline-none">

                                <option value="">
                                    Semua Status
                                </option>

                                @foreach([
                                    'Draft',
                                    'Review Internal',
                                    'Review Eksternal',
                                    'Revisi',
                                    'Menunggu Tanda Tangan',
                                    'Selesai Ditandatangani'
                                ] as $status)

                                    <option value="{{ $status }}"
                                        {{ request('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>


                    <div class="flex justify-end gap-2 mt-4">

                        <a href="{{ route('contracts.index') }}"
                           class="px-4 py-2 text-sm text-slate-500 border border-slate-300 rounded-lg hover:bg-slate-50">
                            Reset
                        </a>

                        <button type="submit"
                                class="px-5 py-2 bg-slate-800 text-white rounded-lg text-sm hover:bg-slate-900">
                            Cari
                        </button>

                    </div>

                </form>

            </div>


            <!-- TABLE -->
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-100 flex flex-wrap items-center justify-between gap-4">

                    <div>
                        <h2 class="font-semibold text-slate-700">
                            Data Kontrak
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            {{ $contracts->total() }} kontrak ditemukan
                        </p>
                    </div>

                    <form method="GET" action="{{ route('contracts.index') }}" class="flex items-center gap-2">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        @if(request('kategori'))
                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                        @endif
                        @if(request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif
                        <label for="perPage" class="text-xs text-slate-500 font-medium">Tampilkan:</label>
                        <select name="per_page" id="perPage" onchange="this.form.submit()" class="border border-slate-300 rounded-lg px-2.5 py-1.5 text-xs text-slate-700 outline-none focus:ring-2 focus:ring-sky-400 bg-white">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 per halaman</option>
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 per halaman</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 per halaman</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 per halaman</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 per halaman</option>
                        </select>
                    </form>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-slate-50 border-b border-slate-100">

                            <tr class="text-xs text-slate-400">

                                <th class="text-left px-6 py-4">
                                    No
                                </th>

                                <th class="text-left px-4 py-4">
                                    Kode
                                </th>

                                <th class="text-left px-4 py-4">
                                    Judul Kontrak
                                </th>

                                <th class="text-left px-4 py-4">
                                    Kategori
                                </th>

                                <th class="text-left px-4 py-4">
                                    Pihak
                                </th>

                                <th class="text-left px-4 py-4">
                                    Periode
                                </th>

                                <th class="text-left px-4 py-4">
                                    Nilai
                                </th>

                                <th class="text-left px-4 py-4">
                                    Status
                                </th>

                                <th class="text-center px-4 py-4">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                        @forelse($contracts as $index => $contract)

                            @php

                                $statusClass = match($contract->status) {

                                    'Selesai Ditandatangani'
                                        => 'bg-emerald-50 text-emerald-600',

                                    'Menunggu Tanda Tangan'
                                        => 'bg-amber-50 text-amber-600',

                                    'Review Internal',
                                    'Review Eksternal'
                                        => 'bg-blue-50 text-blue-600',

                                    'Revisi'
                                        => 'bg-orange-50 text-orange-600',

                                    'Draft'
                                        => 'bg-slate-100 text-slate-600',

                                    default
                                        => 'bg-slate-100 text-slate-600'
                                };

                            @endphp


                            <tr class="hover:bg-slate-50">

                                <td class="px-6 py-4 text-xs text-slate-400">
                                    {{ $contracts->firstItem() + $index }}
                                </td>


                                <td class="px-4 py-4">

                                    <span class="font-medium text-slate-600">
                                        {{ $contract->kode }}
                                    </span>

                                </td>


                                <td class="px-4 py-4">

                                    <a href="{{ route('contracts.show', $contract) }}"
                                       class="font-medium text-slate-700 hover:text-sky-500">

                                        {{ $contract->judul }}

                                    </a>

                                </td>


                                <td class="px-4 py-4">

                                    <span class="text-xs text-slate-500">
                                        {{ $contract->kategori }}
                                    </span>

                                </td>


                                <td class="px-4 py-4 text-xs text-slate-500">
                                    {{ $contract->pihak }}
                                </td>


                                <td class="px-4 py-4 text-xs text-slate-500 whitespace-nowrap">

                                    {{ $contract->tanggal_mulai->format('d M Y') }}

                                    <br>

                                    <span class="text-slate-300">s/d</span>

                                    <br>

                                    {{ $contract->tanggal_berakhir->format('d M Y') }}

                                </td>


                                <td class="px-4 py-4 text-xs font-medium text-slate-600 whitespace-nowrap">

                                    Rp {{ number_format($contract->nilai_kontrak, 0, ',', '.') }}

                                </td>


                                <td class="px-4 py-4">

                                    <span class="inline-flex px-2.5 py-1 rounded-full text-[11px] font-medium {{ $statusClass }}">

                                        {{ $contract->status }}

                                    </span>

                                </td>


                                <td class="px-4 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('contracts.show', $contract) }}"
                                           class="px-3 py-1.5 rounded-md bg-slate-100 text-slate-600 text-xs hover:bg-slate-200">
                                            Detail
                                        </a>

                                        <a href="{{ route('contracts.edit', $contract) }}"
                                           class="px-3 py-1.5 rounded-md bg-blue-50 text-blue-600 text-xs hover:bg-blue-100">
                                            Edit
                                        </a>

                                        <form action="{{ route('contracts.destroy', $contract) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus kontrak ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="px-3 py-1.5 rounded-md bg-red-50 text-red-500 text-xs hover:bg-red-100">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9"
                                    class="px-6 py-16 text-center">

                                    <div class="text-slate-400">

                                        <div class="text-4xl mb-3">
                                            📄
                                        </div>

                                        <p class="text-sm">
                                            Belum ada data kontrak.
                                        </p>

                                        <a href="{{ route('contracts.create') }}"
                                           class="inline-block mt-3 text-sky-500 text-sm hover:underline">
                                            + Tambahkan kontrak
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->
                @if($contracts->hasPages())

                    <div class="px-6 py-4 border-t border-slate-100">

                        {{ $contracts->links() }}

                    </div>

                @endif

            </div>

        </div>

    </main>

</div>

</body>
</html>