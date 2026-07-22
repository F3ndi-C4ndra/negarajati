<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistik;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    public function index()
    {
        // Ambil data statistik pertama dari database, buat objek baru jika masih kosong
        $statistik = Statistik::first() ?? new Statistik();
        
        return view('admin.statistik', compact('statistik'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'total_warga'     => 'required|integer|min:0',
            'laki_laki'       => 'required|integer|min:0',
            'perempuan'       => 'required|integer|min:0',
            'kepala_keluarga' => 'required|integer|min:0',
            'rt'              => 'required|integer|min:0',
            'rw'              => 'required|integer|min:0',
        ]);

        $statistik = Statistik::first();

        if ($statistik) {
            $statistik->update($request->all());
        } else {
            Statistik::create($request->all());
        }

        return redirect()->back()->with('success', 'Data statistik kependudukan berhasil diperbarui!');
    }
}