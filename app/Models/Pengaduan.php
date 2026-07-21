<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    // Izinkan semua kolom di bawah ini diisi secara mass assignment
    protected $fillable = [
        'nama',
        'nik',
        'telepon',
        'judul',
        'isi',
        'status',
    ];
}