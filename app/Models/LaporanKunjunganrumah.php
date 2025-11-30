<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class LaporanKunjunganrumah extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'laporan_kunjunganrumahs';
    protected $guarded = ['id'];
}
