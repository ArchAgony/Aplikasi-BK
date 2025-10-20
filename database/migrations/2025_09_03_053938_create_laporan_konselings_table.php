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
        Schema::create('laporan_konselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->nullOnDelete();
            $table->foreignId('guru_id')->constrained('users')->cascadeOnDelete();
            $table->enum('evaluasi', ['efektif', 'tidak efektif']);
            $table->date('tanggal');
            $table->text('masalah');
            $table->text('penyebab')->nullable();
            $table->text('tindak_lanjut');
            $table->text('kesimpulan_tindak_lanjut')->nullable();
            $table->text('hasil_wawancara')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_konselings');
    }
};
