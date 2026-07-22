<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilDesa;
use App\Models\Statistik;
use App\Models\Umkm;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data dari database untuk dikirim ke homepage
        $profil = ProfilDesa::first();
        $statistik = Statistik::first();
        $beritas = Berita::latest()->take(3)->get();
        $umkms = Umkm::latest()->take(3)->get(); // <--- Ini yang bikin error jika belum ada

        // Mengirimkan variabel ke view frontend/home.blade.php
        return view('frontend.home', compact('profil', 'statistik', 'beritas', 'umkms'));
    }

    public function storePengaduan(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string',
        ]);

        Pengaduan::create($request->only(['nama', 'telepon', 'judul', 'isi']));

        return redirect()->back()->with('success', 'Pengaduan/Aspirasi Anda berhasil dikirim!');
    }
}