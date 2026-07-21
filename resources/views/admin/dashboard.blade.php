@extends('layouts.app') {{-- Sesuaikan layout admin kamu jika berbeda --}}

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-4">Dashboard Admin</h1>

    <!-- Card Ringkasan Data -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h5 class="text-muted">Total Berita</h5>
                <h2 class="fw-bold my-2">{{ \App\Models\Berita::count() }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h5 class="text-muted">Total Pengaduan</h5>
                <h2 class="fw-bold my-2">{{ \App\Models\Pengaduan::count() }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center">
                <h5 class="text-muted">Total UMKM</h5>
                <h2 class="fw-bold my-2">{{ \App\Models\Umkm::count() }}</h2>
            </div>
        </div>
    </div>

    <!-- Tombol Navigasi Fitur Admin -->
    <div class="row g-3">
        <div class="col-md-3">
            <a href="{{ route('admin.berita.index') }}" class="btn btn-success btn-lg w-100 py-3 fw-semibold">
                Kelola Berita
            </a>
        </div>
        <div class="col-md-3">
            <a href="/admin/galeri" class="btn btn-primary btn-lg w-100 py-3 fw-semibold">
                Kelola Galeri
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-warning text-dark btn-lg w-100 py-3 fw-semibold">
                Kelola UMKM
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-danger btn-lg w-100 py-3 fw-semibold">
                Pengaduan
            </a>
        </div>
        <div class="col-md-3">
    <a href="{{ route('admin.statistik.index') }}" class="btn btn-info text-white btn-lg w-100 py-3 fw-semibold">
        Kelola Statistik
    </a>
</div>
    </div>
</div>
@endsection