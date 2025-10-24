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
            $table->foreignId('guru_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->nullOnDelete();
            $table->foreignId('alamat_id')->nullable()->constrained('buku_tamus')->nullOnDelete();
            $table->dateTime('tanggal');
            $table->string('nama_guru')->nullable();
            $table->string('tujuan')->nullable();
            $table->text('hasil_wawancara')->nullable();
            $table->text('kesimpulan_tindak_lanjut')->nullable();
            $table->string('ttd_path')->nullable();
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
