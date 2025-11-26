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
        Schema::create('laporan_kunjunganrumahs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('siswa_id')->nullable()->constrained('siswas')->onDelete('restrict');
            $table->string('tujuan_kunjungan');
            $table->string('hasil_wawancara');
            $table->string('kesimpulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kunjunganrumahs');
    }
};
