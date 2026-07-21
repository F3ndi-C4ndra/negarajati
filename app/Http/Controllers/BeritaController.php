<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita di halaman Admin
     */
    public function index()
    {
        $beritas = Berita::latest()->get();

        return view('admin.berita', compact('beritas'));
    }

    /**
     * Menampilkan form tambah berita
     */
    public function create()
    {
        return view('admin.tambah-berita');
    }

    /**
     * Menyimpan berita baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul'  => $request->judul,
            'isi'    => $request->isi,
            'gambar' => $gambarPath
        ]);

        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Menampilkan detail berita di halaman Frontend
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return view('frontend.detail-berita', compact('berita'));
    }

    /**
     * Menampilkan form edit berita
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.edit-berita', compact('berita'));
    }

    /**
     * Memperbarui berita (Termasuk opsional ganti gambar)
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'  => 'required|string|max:255',
            'isi'    => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $gambarPath = $berita->gambar;

        // Jika user mengunggah gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dari storage jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update([
            'judul'  => $request->judul,
            'isi'    => $request->isi,
            'gambar' => $gambarPath
        ]);

        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil diperbarui');
    }

    /**
     * Menghapus berita beserta gambarnya dari storage
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus data dari database
        $berita->delete();

        return redirect('/admin/berita')
            ->with('success', 'Berita berhasil dihapus');
    }
}