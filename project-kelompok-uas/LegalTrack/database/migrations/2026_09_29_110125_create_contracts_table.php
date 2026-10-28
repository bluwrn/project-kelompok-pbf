<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {

            $table->id();

            // Kode kontrak
            $table->string('kode', 100)->unique();

            // Informasi kontrak
            $table->string('judul');
            $table->string('kategori', 100);
            $table->string('pihak');

            // Periode kontrak
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');

            // Nilai kontrak
            $table->decimal('nilai_kontrak', 15, 2)->default(0);

            // Tahapan/status kontrak
            $table->enum('status', [
                'Draft',
                'Review Internal',
                'Review Eksternal',
                'Revisi',
                'Menunggu Tanda Tangan',
                'Selesai Ditandatangani'
            ])->default('Draft');

            // Keterangan tambahan
            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};