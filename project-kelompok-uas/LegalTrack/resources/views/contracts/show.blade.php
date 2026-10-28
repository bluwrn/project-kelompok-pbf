<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Kontrak - LegalTrack</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto py-10 px-4">

    <div class="mb-6">

        <a href="{{ route('contracts.index') }}"
           class="text-blue-600 hover:text-blue-800">
            ← Kembali ke Daftar Kontrak
        </a>

        <h1 class="text-3xl font-bold text-gray-800 mt-4">
            Detail Kontrak
        </h1>

    </div>

    <div class="bg-white rounded-2xl shadow p-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <p class="text-sm text-gray-500">
                    Kode Kontrak
                </p>

                <p class="text-lg font-semibold text-gray-800">
                    {{ $contract->kode }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Judul Kontrak
                </p>

                <p class="text-lg font-semibold text-gray-800">
                    {{ $contract->judul }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Kategori
                </p>

                <p class="text-lg text-gray-800">
                    {{ $contract->kategori }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Pihak Terkait
                </p>

                <p class="text-lg text-gray-800">
                    {{ $contract->pihak }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Tanggal Mulai
                </p>

                <p class="text-lg text-gray-800">
                    {{ $contract->tanggal_mulai->format('d F Y') }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Tanggal Berakhir
                </p>

                <p class="text-lg text-gray-800">
                    {{ $contract->tanggal_berakhir->format('d F Y') }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Nilai Kontrak
                </p>

                <p class="text-lg font-semibold text-green-600">
                    Rp {{ number_format($contract->nilai_kontrak, 0, ',', '.') }}
                </p>
            </div>

            <div>
                <p class="text-sm text-gray-500">
                    Status
                </p>

                <span class="inline-block mt-1 px-3 py-1 rounded-full bg-blue-100 text-blue-700">
                    {{ $contract->status }}
                </span>
            </div>

        </div>

        <div class="mt-8">

            <p class="text-sm text-gray-500 mb-2">
                Keterangan
            </p>

            <div class="bg-gray-50 rounded-lg p-4 text-gray-700">
                {{ $contract->keterangan ?: 'Tidak ada keterangan.' }}
            </div>

        </div>

        <div class="flex gap-3 mt-8">

            <a href="{{ route('contracts.edit', $contract) }}"
               class="px-5 py-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                Edit
            </a>

            <form action="{{ route('contracts.destroy', $contract) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus kontrak ini?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-5 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Hapus
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>