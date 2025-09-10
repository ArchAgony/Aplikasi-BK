<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ortu extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'ortus';
    protected $guarded = ['id'];

     public function siswas()
    {
        return $this->hasMany(Siswa::class, 'orang_tua_id');
    }

    public function kunjunganRumahs()
    {
        return $this->hasMany(KunjunganRumah::class, 'orang_tua_id');
    }
}
