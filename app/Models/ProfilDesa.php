<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kades',
        'foto_kades',
        'sambutan_kades',
        'sejarah_desa',
        'visi',
        'misi',
        'alamat_kantor',
        'no_telepon',
        'email_desa',
        'hero_title',    // <--- Tambahan
    'hero_subtitle', // <--- Tambahan
    'hero_image',
    ];
}