<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Evaluasi extends Model
{
    //
    use HasFactory, Notifiable;

    protected $table = 'evaluasis';
    protected $id = ['id'];
}
