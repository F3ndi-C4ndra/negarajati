<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Statistik;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 berita terbaru untuk beranda
        $beritas = Berita::latest()->take(3)->get();
        
        // Ambil data statistik dari database (atau fallback default jika belum diisi)
        $statistik = Statistik::first() ?? (object) [
            'total_warga' => 5946,
            'laki_laki' => 3027,
            'perempuan' => 2919,
            'kepala_keluarga' => 1872,
            'rt' => 24,
            'rw' => 6
        ];

        return view('frontend.home', compact('beritas', 'statistik'));
    }

    public function storePengaduan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'judul' => 'required|string|max:255',
            'isi' => 'required',
        ]);

        // Simpan data pengaduan warga
        Pengaduan::create($request->only(['nama', 'telepon', 'judul', 'isi']));

        return back()->with('success', 'Pengaduan/Aspirasi Anda berhasil dikirim!');
    }
}