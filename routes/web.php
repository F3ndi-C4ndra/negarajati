<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\GaleriController;

/*
|--------------------------------------------------------------------------
| Web Routes - Website Desa Negarajati
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. FRONTEND / HALAMAN PUBLIK (Akses Warga)
// ==========================================

// Halaman Utama / Landing Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Form Pengaduan Warga (Submit)
Route::post('/pengaduan', [HomeController::class, 'storePengaduan'])->name('pengaduan.store');

// Halaman Profil Desa
Route::get('/profil', function () {
    return view('frontend.profil');
})->name('profil');

// Halaman Berita Publik
Route::get('/berita', function () {
    $beritas = \App\Models\Berita::latest()->get();
    return view('frontend.berita', compact('beritas'));
})->name('berita.index');

// Detail Berita
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

// Lapak UMKM Publik
Route::get('/umkm', [UmkmController::class, 'frontendIndex'])->name('umkm.index');

// Produk Hukum & Transparansi Publik
Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');


// ==========================================
// 2. BACKEND / ADMIN PANEL (Wajib Login)
// ==========================================

Route::middleware(['auth'])->group(function () {
    
    // Dashboard Admin
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Berita
    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // Admin Pengaduan
    Route::get('/admin/pengaduan', [PengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::put('/admin/pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('admin.pengaduan.updateStatus');
    Route::delete('/admin/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');

    // Admin Statistik
    Route::get('/admin/statistik', [StatistikController::class, 'index'])->name('admin.statistik.index');
    Route::put('/admin/statistik', [StatistikController::class, 'update'])->name('admin.statistik.update');
    // Admin UMKM
    Route::get('/admin/umkm', [UmkmController::class, 'index'])->name('admin.umkm.index');
    Route::post('/admin/umkm', [UmkmController::class, 'store'])->name('admin.umkm.store');
    Route::delete('/admin/umkm/{id}', [UmkmController::class, 'destroy'])->name('admin.umkm.destroy');

    // Admin Galeri
    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');

    // Profile Admin (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Auth Routes bawaan Laravel Breeze (Login, Register, Logout)
require __DIR__.'/auth.php';