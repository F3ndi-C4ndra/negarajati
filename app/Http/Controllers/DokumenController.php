<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    // Akses Publik (Warga)
    public function index()
    {
        $dokumens = Dokumen::latest()->get();
        return view('frontend.dokumen', compact('dokumens'));
    }

    // Akses Admin Panel
    public function adminIndex()
    {
        $dokumens = Dokumen::latest()->get();
        return view('admin.dokumen', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string',
            'tahun'     => 'required|digits:4',
            'file_dokumen' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:10240', // Maks 10MB
            'keterangan'=> 'nullable|string',
        ]);

        $filePath = $request->file('file_dokumen')->store('dokumen', 'public');

        Dokumen::create([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori,
            'tahun'     => $request->tahun,
            'file_path' => $filePath,
            'keterangan'=> $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Produk Hukum/Dokumen berhasil diunggah!');
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::findOrFail($id);

        if ($dokumen->file_path) {
            Storage::disk('public')->delete($dokumen->file_path);
        }

        $dokumen->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus!');
    }
}