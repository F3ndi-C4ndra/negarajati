<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = [
            [
                'judul' => 'Peraturan Desa No. 02 Tahun 2024 tentang APBDES Negarajati',
                'kategori' => 'Peraturan Desa',
                'tahun' => '2024',
                'file' => '#'
            ],
            [
                'judul' => 'Laporan Realisasi Anggaran Pendapatan dan Belanja Desa 2023',
                'kategori' => 'Laporan Keuangan',
                'tahun' => '2023',
                'file' => '#'
            ],
            [
                'judul' => 'SK Kepala Desa tentang Penetapan Pengurus BUMDes',
                'kategori' => 'Surat Keputusan',
                'tahun' => '2023',
                'file' => '#'
            ],
        ];

        return view('frontend.dokumen', compact('dokumens'));
    }
}