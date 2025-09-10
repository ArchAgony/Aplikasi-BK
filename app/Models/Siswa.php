<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Siswa extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'siswas';
    protected $id = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function bukuTamus()
    {
        return $this->hasMany(BukuTamu::class, 'siswa_id');
    }

    public function laporanKonselings()
    {
        return $this->hasMany(LaporanKonseling::class, 'siswa_id');
    }

    public function kunjunganRumahs()
    {
        return $this->hasMany(KunjunganRumah::class, 'siswa_id');
    }
}
