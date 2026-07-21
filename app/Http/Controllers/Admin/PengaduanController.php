<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('admin.pengaduan', compact('pengaduans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status pengaduan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return back()->with('success', 'Pengaduan berhasil dihapus!');
    }
}