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
        Schema::create('kunjungan_rumahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->onDelete('restrict');
            // $table->foreignId('alamat_id')->nullable()->constrained('buku_tamus')->onDelete('restrict');
            $table->date('tanggal')->nullable();
            $table->string('peran');
            $table->string('hubungan_wali')->nullable();
            $table->string('nama');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('alasan_tujuan');
            $table->string('hasil_wawancara');
            $table->string('tindak_lanjut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan_rumahs');
    }
};
