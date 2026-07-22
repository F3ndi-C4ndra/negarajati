<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $profil = ProfilDesa::first() ?? new ProfilDesa();
        return view('admin.banner', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title'    => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_image'    => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        $profil = ProfilDesa::first() ?? new ProfilDesa();
        $data = $request->only(['hero_title', 'hero_subtitle']);

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

        return redirect()->back()->with('success', 'Banner Homepage berhasil diperbarui!');
    }
}