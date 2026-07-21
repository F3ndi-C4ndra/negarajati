<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_warga',
        'laki_laki',
        'perempuan',
        'kepala_keluarga',
        'rt',
        'rw',
    ];
}