<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::first() ?? new ProfilDesa();
        return view('admin.profil', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_kades'     => 'required|string|max:255',
            'hero_title'     => 'nullable|string|max:255',
            'hero_subtitle'  => 'nullable|string|max:255',
            'hero_image'     => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
            'foto_kades'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sambutan_kades' => 'nullable|string',
            'sejarah_desa'   => 'nullable|string',
            'visi'           => 'nullable|string',
            'misi'           => 'nullable|string',
            'alamat_kantor'  => 'nullable|string',
            'no_telepon'     => 'nullable|string',
            'email_desa'     => 'nullable|email',
        ]);

        $profil = ProfilDesa::first() ?? new ProfilDesa();

        // Ambil semua request kecuali file gambar agar diproses terpisah
        $data = $request->except(['foto_kades', 'hero_image']);

        // Upload Foto Kades jika ada
        if ($request->hasFile('foto_kades')) {
            if ($profil->foto_kades) {
                Storage::disk('public')->delete($profil->foto_kades);
            }
            $data['foto_kades'] = $request->file('foto_kades')->store('profil', 'public');
        }

        // Upload Gambar Banner Homepage jika ada
        if ($request->hasFile('hero_image')) {
            if ($profil->hero_image) {
                Storage::disk('public')->delete($profil->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('banner', 'public');
        }

        if ($profil->exists) {
            $profil->update($data);
        } else {
            ProfilDesa::create($data);
        }

        return redirect()->back()->with('success', 'Profil Desa & Banner Utama berhasil diperbarui!');
    }
}