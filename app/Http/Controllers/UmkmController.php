<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    // Frontend: Halaman Publik UMKM
    public function frontendIndex()
    {
        $umkms = Umkm::latest()->get();
        return view('frontend.umkm', compact('umkms'));
    }

    // Backend: Admin CRUD UMKM
    public function index()
    {
        $umkms = Umkm::latest()->get();
        return view('admin.umkm', compact('umkms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required',
            'pemilik'    => 'required',
            'deskripsi'  => 'required',
            'telepon'    => 'required',
            'gambar'     => 'nullable|image|max:2048'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('umkm', 'public');
        }

        Umkm::create([
            'nama_usaha' => $request->nama_usaha,
            'pemilik'    => $request->pemilik,
            'deskripsi'  => $request->deskripsi,
            'telepon'    => $request->telepon,
            'gambar'     => $gambarPath,
        ]);

        return back()->with('success', 'Produk UMKM berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        if ($umkm->gambar && Storage::disk('public')->exists($umkm->gambar)) {
            Storage::disk('public')->delete($umkm->gambar);
        }
        $umkm->delete();

        return back()->with('success', 'Data UMKM berhasil dihapus!');
    }
}