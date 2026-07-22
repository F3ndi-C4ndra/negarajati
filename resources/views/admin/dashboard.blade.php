@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Header Dashboard -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-success m-0">Dashboard Admin</h2>
            <small class="text-muted">Selamat datang di Panel Pengelola Informasi Desa Negarajati</small>
        </div>
    </div>

    <!-- Card Ringkasan Data -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-4 text-center rounded-3 bg-white">
                <h5 class="text-muted mb-1">Total Berita</h5>
                <h2 class="fw-bold my-2 text-success">{{ \App\Models\Berita::count() }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-4 text-center rounded-3 bg-white">
                <h5 class="text-muted mb-1">Total Pengaduan</h5>
                <h2 class="fw-bold my-2 text-danger">{{ \App\Models\Pengaduan::count() }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-4 text-center rounded-3 bg-white">
                <h5 class="text-muted mb-1">Total UMKM</h5>
                <h2 class="fw-bold my-2 text-warning">{{ \App\Models\Umkm::count() }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-4 text-center rounded-3 bg-white">
                <h5 class="text-muted mb-1">Produk Hukum</h5>
                <h2 class="fw-bold my-2 text-dark">{{ \App\Models\Dokumen::count() }}</h2>
            </div>
        </div>
    </div>

    <!-- Tombol Navigasi Fitur Admin (Grid Rapi) -->
    <h5 class="fw-bold mb-3 text-secondary">Menu Pengelolaan</h5>
    <div class="row g-3">
        <div class="col-md-3">
            <a href="{{ route('admin.berita.index') }}" class="btn btn-success btn-lg w-100 py-3 fw-semibold shadow-sm">
                <i class="bi bi-newspaper me-2"></i> Kelola Berita
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.profil.index') }}" class="btn btn-secondary btn-lg w-100 py-3 fw-semibold shadow-sm">
                <i class="bi bi-person-lines-fill me-2"></i> Kelola Profil Desa
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-primary btn-lg w-100 py-3 fw-semibold shadow-sm">
                <i class="bi bi-images me-2"></i> Kelola Galeri
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-warning text-dark btn-lg w-100 py-3 fw-semibold shadow-sm">
                <i class="bi bi-shop me-2"></i> Kelola UMKM
            </a>
        </div>
        <div class="col-md-3">
    <a href="{{ route('admin.banner.index') }}" class="btn btn-purple text-white btn-lg w-100 py-3 fw-semibold shadow-sm" style="background-color: #6f42c1;">
        <i class="bi bi-window-stack me-2"></i> Kelola Banner
    </a>
</div>
        <div class="col-md-3">
            <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-danger btn-lg w-100 py-3 fw-semibold shadow-sm">
                <i class="bi bi-chat-left-dots me-2"></i> Pengaduan
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.statistik.index') }}" class="btn btn-info text-white btn-lg w-100 py-3 fw-semibold shadow-sm">
                <i class="bi bi-bar-chart-fill me-2"></i> Kelola Statistik
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.dokumen.index') }}" class="btn btn-dark btn-lg w-100 py-3 fw-semibold shadow-sm">
                <i class="bi bi-file-earmark-text me-2"></i> Produk Hukum
            </a>
        </div>
    </div>
</div>
@endsection