<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LayananKunjunganrumah extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'layanan_kunjunganrumahs';
    protected $guarded = ['id'];
}
