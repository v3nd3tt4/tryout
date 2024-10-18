<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Soal extends Model
{
    use HasFactory;
    protected $table = 'soals';
    protected $fillable = ['kategori_soal', 'keterangan_soal'];
}
