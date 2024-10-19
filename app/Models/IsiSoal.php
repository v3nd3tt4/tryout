<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiSoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori_soal',
        'isi_soal',
        'pilihan_jawaban_a',
        'pilihan_jawaban_b',
        'pilihan_jawaban_c',
        'pilihan_jawaban_d',
        'pilihan_jawaban_e',
        'kunci_jawaban',
    ];

    // Jika nama tabel Anda berbeda dari konvensi Laravel, tentukan di sini
    // protected $table = 'nama_tabel_anda';

    // Jika primary key Anda bukan 'id', tentukan di sini
    // protected $primaryKey = 'nama_primary_key_anda';

    // Jika Anda tidak menggunakan timestamps (created_at dan updated_at)
    // public $timestamps = false;
}

