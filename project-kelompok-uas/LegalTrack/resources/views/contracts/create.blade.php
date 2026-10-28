<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kontrak - LegalTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>
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

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800">
                🏠
                <span class="text-sm">Dasbor</span>
            </a>

            <a href="{{ route('contracts.create') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg bg-[#1e293b] text-white">

                <span class="w-1 h-6 bg-sky-400 rounded-full"></span>

                ➕
                <span class="text-sm font-medium">
                    Tambah Kontrak
                </span>

            </a>

            <a href="{{ route('contracts.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-800">
                📄
                <span class="text-sm">Daftar Kontrak</span>
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


    <!-- CONTENT -->
    <main class="ml-64 flex-1">

        <div class="px-8 py-7 max-w-6xl">

            <!-- HEADER -->
            <div class="mb-7">

                <a href="{{ route('contracts.index') }}"
                   class="text-sm text-sky-500 hover:text-sky-600">
                    ← Kembali ke Daftar Kontrak
                </a>

                <h1 class="text-2xl font-bold text-slate-800 mt-4">
                    Tambah Kontrak
                </h1>

                <p class="text-sm text-slate-400 mt-1">
                    Tambahkan data kontrak baru ke dalam sistem LegalTrack.
                </p>

            </div>


            <!-- ERROR -->
            @if ($errors->any())

                <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl p-4 mb-6">

                    <p class="font-semibold mb-2">
                        Terdapat kesalahan:
                    </p>

                    <ul class="list-disc ml-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            <!-- FORM -->
            <form action="{{ route('contracts.store') }}"
                  method="POST">

                @csrf

                <div class="bg-white rounded-xl border border-slate-200 shadow-sm">

                    <!-- SECTION -->
                    <div class="px-6 py-5 border-b border-slate-100">

                        <h2 class="font-semibold text-slate-700">
                            Informasi Kontrak
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            Masukkan informasi utama kontrak.
                        </p>

                    </div>


                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- KODE -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Kode Kontrak
                            </label>

                            <input type="text"
                                   name="kode"
                                   value="{{ old('kode') }}"
                                   placeholder="Contoh: KTR-001/2026"
                                   class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-400 outline-none"
                                   required>
                        </div>


                        <!-- JUDUL -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Judul Kontrak
                            </label>

                            <input type="text"
                                   name="judul"
                                   value="{{ old('judul') }}"
                                   placeholder="Nama atau judul kontrak"
                                   class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 focus:border-sky-400 outline-none"
                                   required>
                        </div>


                        <!-- KATEGORI -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Kategori
                            </label>

                            <select name="kategori"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 outline-none"
                                    required>

                                <option value="">
                                    Pilih kategori
                                </option>

                                <option value="Karyawan"
                                    {{ old('kategori') == 'Karyawan' ? 'selected' : '' }}>
                                    Karyawan
                                </option>

                                <option value="Vendor"
                                    {{ old('kategori') == 'Vendor' ? 'selected' : '' }}>
                                    Vendor
                                </option>

                                <option value="Sub-kontraktor"
                                    {{ old('kategori') == 'Sub-kontraktor' ? 'selected' : '' }}>
                                    Sub-kontraktor
                                </option>

                                <option value="Klien"
                                    {{ old('kategori') == 'Klien' ? 'selected' : '' }}>
                                    Klien
                                </option>

                            </select>
                        </div>


                        <!-- PIHAK -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Pihak Terkait
                            </label>

                            <input type="text"
                                   name="pihak"
                                   value="{{ old('pihak') }}"
                                   placeholder="Nama perusahaan / pihak"
                                   class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 outline-none"
                                   required>
                        </div>


                        <!-- TANGGAL MULAI -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Tanggal Mulai
                            </label>

                            <input type="date"
                                   name="tanggal_mulai"
                                   value="{{ old('tanggal_mulai') }}"
                                   class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 outline-none"
                                   required>
                        </div>


                        <!-- TANGGAL BERAKHIR -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Tanggal Berakhir
                            </label>

                            <input type="date"
                                   name="tanggal_berakhir"
                                   value="{{ old('tanggal_berakhir') }}"
                                   class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 outline-none"
                                   required>
                        </div>


                        <!-- NILAI -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Nilai Kontrak (Rp)
                            </label>

                            <input type="number"
                                   name="nilai_kontrak"
                                   value="{{ old('nilai_kontrak') }}"
                                   min="0"
                                   placeholder="Contoh: 5000000"
                                   class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 outline-none"
                                   required>
                        </div>


                        <!-- STATUS -->
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Status Kontrak
                            </label>

                            <select name="status"
                                    class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 outline-none"
                                    required>

                                <option value="">
                                    Pilih status
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
                                        {{ old('status') == $status ? 'selected' : '' }}>
                                        {{ $status }}
                                    </option>

                                @endforeach

                            </select>
                        </div>


                        <!-- KETERANGAN -->
                        <div class="md:col-span-2">

                            <label class="block text-sm font-medium mb-2">
                                Keterangan
                            </label>

                            <textarea name="keterangan"
                                      rows="5"
                                      placeholder="Tambahkan keterangan jika diperlukan..."
                                      class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm focus:ring-2 focus:ring-sky-400 outline-none">{{ old('keterangan') }}</textarea>

                        </div>

                    </div>


                    <!-- BUTTON -->
                    <div class="px-6 py-5 border-t border-slate-100 flex justify-end gap-3">

                        <a href="{{ route('contracts.index') }}"
                           class="px-5 py-2.5 rounded-lg border border-slate-300 text-sm text-slate-600 hover:bg-slate-50">
                            Batal
                        </a>

                        <button type="submit"
                                class="px-5 py-2.5 rounded-lg bg-sky-500 text-white text-sm font-medium hover:bg-sky-600">
                            + Simpan Kontrak
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>