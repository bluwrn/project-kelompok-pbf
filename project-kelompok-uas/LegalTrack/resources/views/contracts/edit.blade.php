<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Kontrak - LegalTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system,
                BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .input-focus:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen">

    <!-- HEADER -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-40">

        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between gap-4">

                <div>
                    <h1 class="text-xl font-bold text-slate-800">
                        Edit Kontrak
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Perbarui informasi kontrak LegalTrack
                    </p>
                </div>

                <a
                    href="{{ route('dashboard') }}"
                    class="inline-flex items-center gap-2
                           px-4 py-2.5
                           rounded-lg
                           bg-slate-100
                           text-slate-700
                           font-medium
                           hover:bg-slate-200
                           transition"
                >
                    ← Kembali
                </a>

            </div>

        </div>

    </header>


    <!-- CONTENT -->
    <main class="max-w-5xl mx-auto px-6 py-8">

        <!-- ERROR VALIDATION -->
        @if ($errors->any())

            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">

                <div class="font-semibold text-red-700 mb-2">
                    Terdapat kesalahan pada data:
                </div>

                <ul class="list-disc list-inside text-sm text-red-600 space-y-1">

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORM CARD -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200">

            <!-- CARD HEADER -->
            <div class="px-6 py-5 border-b border-slate-200">

                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10
                               rounded-xl
                               bg-blue-50
                               text-blue-600
                               flex items-center justify-center
                               font-bold"
                    >
                        ✎
                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Informasi Kontrak
                        </h2>

                        <p class="text-sm text-slate-500">
                            Kode kontrak:
                            <span class="font-semibold text-blue-600">
                                {{ $contract->kode }}
                            </span>
                        </p>

                    </div>

                </div>

            </div>


            <!-- FORM -->
            <form
                action="{{ route('contracts.update', $contract->id) }}"
                method="POST"
                id="editContractForm"
            >

                @csrf

                @method('PUT')


                <div class="p-6 space-y-6">

                    <!-- JUDUL + PIHAK -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- JUDUL -->
                        <div>

                            <label
                                for="judul"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Judul Kontrak
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="judul"
                                name="judul"
                                value="{{ old('judul', $contract->judul) }}"
                                required
                                class="input-focus w-full
                                       rounded-lg
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       text-slate-800
                                       transition"
                                placeholder="Masukkan judul kontrak"
                            >

                        </div>


                        <!-- PIHAK TERKAIT -->
                        <div>

                            <label
                                for="pihak"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Pihak Terkait
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="pihak"
                                name="pihak"
                                value="{{ old('pihak', $contract->pihak) }}"
                                required
                                class="input-focus w-full
                                       rounded-lg
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       text-slate-800
                                       transition"
                                placeholder="Nama pihak terkait"
                            >

                        </div>

                    </div>


                    <!-- KATEGORI + PENANGGUNG JAWAB -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- KATEGORI -->
                        <div>

                            <label
                                for="kategori"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Kategori
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="kategori"
                                name="kategori"
                                required
                                class="input-focus w-full
                                       rounded-lg
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       text-slate-800
                                       bg-white
                                       transition"
                            >

                                @php
                                    $kategori = old(
                                        'kategori',
                                        $contract->kategori
                                    );
                                @endphp

                                <option value="Karyawan"
                                    {{ $kategori === 'Karyawan' ? 'selected' : '' }}>
                                    Karyawan
                                </option>

                                <option value="Vendor"
                                    {{ $kategori === 'Vendor' ? 'selected' : '' }}>
                                    Vendor
                                </option>

                                <option value="Sub-kontraktor"
                                    {{ $kategori === 'Sub-kontraktor' ? 'selected' : '' }}>
                                    Sub-kontraktor
                                </option>

                                <option value="Klien"
                                    {{ $kategori === 'Klien' ? 'selected' : '' }}>
                                    Klien
                                </option>

                            </select>

                        </div>


                        <!-- PENANGGUNG JAWAB -->
                        <div>

                            <label
                                for="penanggung_jawab"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Penanggung Jawab
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="text"
                                id="penanggung_jawab"
                                name="penanggung_jawab"
                                value="{{ old('penanggung_jawab', $contract->penanggung_jawab) }}"
                                required
                                class="input-focus w-full
                                       rounded-lg
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       text-slate-800
                                       transition"
                                placeholder="Nama penanggung jawab"
                            >

                        </div>

                    </div>


                    <!-- NILAI KONTRAK -->
                    <div>

                        <label
                            for="nilai_kontrak_display"
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Nilai Kontrak
                            <span class="text-red-500">*</span>
                        </label>

                        @php
                            $nilaiAwal = old(
                                'nilai_kontrak',
                                $contract->nilai_kontrak
                            );
                        @endphp

                        <div class="relative">

                            <span
                                class="absolute left-4 top-1/2
                                       -translate-y-1/2
                                       text-sm font-semibold
                                       text-slate-500"
                            >
                                Rp
                            </span>

                            <input
                                type="text"
                                id="nilai_kontrak_display"
                                value="{{ number_format((float) $nilaiAwal, 0, ',', '.') }}"
                                required
                                class="input-focus w-full
                                       rounded-lg
                                       border border-slate-300
                                       pl-12 pr-4 py-3
                                       text-sm
                                       text-slate-800
                                       transition"
                                placeholder="0"
                            >

                            <input
                                type="hidden"
                                id="nilai_kontrak"
                                name="nilai_kontrak"
                                value="{{ $nilaiAwal }}"
                            >

                        </div>

                    </div>


                    <!-- TANGGAL -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- TANGGAL MULAI -->
                        <div>

                            <label
                                for="tanggal_mulai"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Tanggal Mulai
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="date"
                                id="tanggal_mulai"
                                name="tanggal_mulai"
                                value="{{ old('tanggal_mulai', $contract->tanggal_mulai) }}"
                                required
                                class="input-focus w-full
                                       rounded-lg
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       text-slate-800
                                       transition"
                            >

                        </div>


                        <!-- TANGGAL BERAKHIR -->
                        <div>

                            <label
                                for="tanggal_berakhir"
                                class="block text-sm font-semibold text-slate-700 mb-2"
                            >
                                Tanggal Berakhir
                                <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="date"
                                id="tanggal_berakhir"
                                name="tanggal_berakhir"
                                value="{{ old('tanggal_berakhir', $contract->tanggal_berakhir) }}"
                                required
                                class="input-focus w-full
                                       rounded-lg
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       text-slate-800
                                       transition"
                            >

                        </div>

                    </div>


                    <!-- STATUS -->
                    <div>

                        <label
                            for="status"
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Status Kontrak
                            <span class="text-red-500">*</span>
                        </label>

                        @php
                            $status = old(
                                'status',
                                $contract->status
                            );
                        @endphp

                        <select
                            id="status"
                            name="status"
                            required
                            class="input-focus w-full
                                   rounded-lg
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   text-slate-800
                                   bg-white
                                   transition"
                        >

                            <option value="Draft"
                                {{ $status === 'Draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="Review Internal"
                                {{ $status === 'Review Internal' ? 'selected' : '' }}>
                                Review Internal
                            </option>

                            <option value="Review Eksternal"
                                {{ $status === 'Review Eksternal' ? 'selected' : '' }}>
                                Review Eksternal
                            </option>

                            <option value="Revisi"
                                {{ $status === 'Revisi' ? 'selected' : '' }}>
                                Revisi
                            </option>

                            <option value="Menunggu Tanda Tangan"
                                {{ $status === 'Menunggu Tanda Tangan' ? 'selected' : '' }}>
                                Menunggu Tanda Tangan
                            </option>

                            <option value="Selesai Ditandatangani"
                                {{ $status === 'Selesai Ditandatangani' ? 'selected' : '' }}>
                                Selesai Ditandatangani
                            </option>

                        </select>

                    </div>


                    <!-- KETERANGAN -->
                    <div>

                        <label
                            for="keterangan"
                            class="block text-sm font-semibold text-slate-700 mb-2"
                        >
                            Keterangan
                        </label>

                        <textarea
                            id="keterangan"
                            name="keterangan"
                            rows="5"
                            class="input-focus w-full
                                   rounded-lg
                                   border border-slate-300
                                   px-4 py-3
                                   text-sm
                                   text-slate-800
                                   transition
                                   resize-y"
                            placeholder="Tambahkan keterangan kontrak..."
                        >{{ old('keterangan', $contract->keterangan) }}</textarea>

                    </div>

                </div>


                <!-- FOOTER FORM -->
                <div
                    class="px-6 py-5
                           bg-slate-50
                           border-t border-slate-200
                           flex flex-col sm:flex-row
                           justify-end gap-3"
                >

                    <a
                        href="{{ route('dashboard') }}"
                        class="px-5 py-2.5
                               rounded-lg
                               border border-slate-300
                               bg-white
                               text-slate-700
                               font-medium
                               text-center
                               hover:bg-slate-100
                               transition"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5
                               rounded-lg
                               bg-blue-600
                               text-white
                               font-semibold
                               hover:bg-blue-700
                               transition
                               shadow-sm"
                    >
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </main>


    <!-- JAVASCRIPT -->
    <script>

        const nilaiDisplay =
            document.getElementById(
                'nilai_kontrak_display'
            );

        const nilaiHidden =
            document.getElementById(
                'nilai_kontrak'
            );


        function formatRupiah(value)
        {
            let angka =
                value
                    .replace(/\D/g, '');

            if (!angka)
            {
                return '';
            }

            return new Intl.NumberFormat(
                'id-ID'
            ).format(
                Number(angka)
            );
        }


        if (nilaiDisplay)
        {
            nilaiDisplay.addEventListener(
                'input',
                function ()
                {
                    const angka =
                        this.value.replace(
                            /\D/g,
                            ''
                        );

                    this.value =
                        formatRupiah(
                            angka
                        );

                    nilaiHidden.value =
                        angka || 0;
                }
            );
        }


        const form =
            document.getElementById(
                'editContractForm'
            );


        if (form)
        {
            form.addEventListener(
                'submit',
                function (event)
                {
                    const mulai =
                        document.getElementById(
                            'tanggal_mulai'
                        ).value;

                    const berakhir =
                        document.getElementById(
                            'tanggal_berakhir'
                        ).value;


                    if (
                        mulai &&
                        berakhir &&
                        berakhir <= mulai
                    )
                    {
                        event.preventDefault();

                        Swal.fire({
                            icon: 'warning',
                            title: 'Tanggal tidak valid',
                            text: 'Tanggal berakhir harus setelah tanggal mulai.',
                            confirmButtonText: 'Mengerti'
                        });

                        return;
                    }


                    if (
                        !nilaiHidden.value ||
                        Number(nilaiHidden.value) < 0
                    )
                    {
                        event.preventDefault();

                        Swal.fire({
                            icon: 'warning',
                            title: 'Nilai kontrak tidak valid',
                            text: 'Silakan masukkan nilai kontrak yang benar.',
                            confirmButtonText: 'Mengerti'
                        });
                    }
                }
            );
        }

    </script>

</body>

</html>