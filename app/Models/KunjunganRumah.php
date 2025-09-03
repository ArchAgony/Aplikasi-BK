<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class KunjunganRumah extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'kunjungan_rumahs';
    protected $id = ['id'];
}
