<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri', compact('galeris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan foto ke folder public/galeri
        $fotoPath = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'judul' => $request->judul,
            'foto'  => $fotoPath,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Foto baru berhasil ditambahkan ke galeri!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file foto dari storage
        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus dari galeri!');
    }
}