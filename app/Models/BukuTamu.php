<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BukuTamu extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'siswas';
    protected $id = ['id'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
