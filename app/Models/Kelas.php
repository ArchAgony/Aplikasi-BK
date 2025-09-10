<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kelas extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'kelas';
    protected $id = ['id'];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas_id');
    }
}
