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
        Schema::create('buku_tamus', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            // $table->foreignId('guru_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->onDelete('restrict');
            $table->string('nama_tamu');
            $table->string('no_telp', 30)->nullable();
            $table->text('alamat')->nullable();
            // $table->text('keperluan');
            $table->integer('kunjungan_ke')->default(1);
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
        Schema::dropIfExists('buku_tamus');
    }
};
