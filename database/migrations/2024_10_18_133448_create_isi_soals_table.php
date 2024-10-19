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
        Schema::create('isi_soals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kategori_soal');
            $table->text('isi_soal');
            $table->text('pilihan_jawaban_a');
            $table->text('pilihan_jawaban_b');
            $table->text('pilihan_jawaban_c');
            $table->text('pilihan_jawaban_d');
            $table->text('pilihan_jawaban_e');
            $table->string('kunci_jawaban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isi_soals');
    }
};
