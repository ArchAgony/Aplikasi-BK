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
        Schema::create('layanan_kunjunganrumahs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_layanan');
            $table->string('bidang_bimbingan');
            $table->string('fungsi');
            $table->string('tujuan');
            $table->string('hasil_dicapai');

            // ini siswa?
            $table->string('subjek');
            
            $table->string('gambaran_masalah');
            $table->string('tempat_dikunjungi');
            $table->date('tanggal');
            $table->integer('semester');

            // guru bk nanti
            $table->string('petugas_pengunjung');
            $table->string('anggota_dikunjungi');
            $table->string('keterangan');
            $table->string('penggunaan_pertemuan');
            $table->string('rencana_penilaian');
            $table->string('catatan_khusus');
            $table->string('ttd_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_kunjunganrumahs');
    }
};
