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
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->nullOnDelete();
            $table->foreignId('guru_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->nullOnDelete();
            $table->text('masalah')->nullable();
            $table->text('penyebab')->nullable();
            $table->text('penyelesaian')->nullable();
            $table->text('hasil_laporan_konseling')->nullable();
            $table->text('tindak_lanjut')->nullable();
            $table->string('ttd_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasis');
    }
};
