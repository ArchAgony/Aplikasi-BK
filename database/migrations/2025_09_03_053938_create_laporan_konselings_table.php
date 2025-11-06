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
            $table->date('tanggal');
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->nullOnDelete();
            $table->text('masalah');
            $table->text('penyebab')->nullable();
            $table->text('kesimpulan_masalah');
            $table->text('penyelesaian');
            $table->enum('evaluasi', ['efektif', 'tidak efektif']);
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
