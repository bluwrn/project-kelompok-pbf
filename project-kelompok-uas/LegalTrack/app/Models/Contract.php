<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $fillable = [
        'kode',
        'judul',
        'kategori',
        'pihak',
        'penanggung_jawab',
        'tanggal_mulai',
        'tanggal_berakhir',
        'nilai_kontrak',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_berakhir' => 'date',
        'nilai_kontrak' => 'decimal:2',
    ];
}