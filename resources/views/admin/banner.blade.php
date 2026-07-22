@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-success m-0">Kelola Banner Homepage</h3>
            <small class="text-muted">Ubah judul utama, sub-judul, dan foto latar belakang portal depan</small>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary fw-semibold">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
        <form action="{{ route('admin.banner.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Judul Utama Banner (Hero Title)</label>
                    <input type="text" name="hero_title" class="form-control" 
                           value="{{ old('hero_title', $profil->hero_title ?? 'Selamat Datang di Portal Informasi Desa Negarajati') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Sub-Judul Banner (Hero Subtitle)</label>
                    <input type="text" name="hero_subtitle" class="form-control" 
                           value="{{ old('hero_subtitle', $profil->hero_subtitle ?? 'Kecamatan Cimanggu, Kabupaten Cilacap, Jawa Tengah') }}" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">Gambar Background Banner Utama</label>
                    <input type="file" name="hero_image" class="form-control" accept="image/*">
                    <small class="text-muted">Biarkan kosong jika tidak diubah. Format: JPG/PNG (Maks 3MB).</small>
                    @if(!empty($profil->hero_image))
                        <div class="mt-2">
                            <span class="d-block text-muted small mb-1">Gambar saat ini:</span>
                            <img src="{{ asset('storage/' . $profil->hero_image) }}" class="img-thumbnail rounded" style="max-height: 150px;" alt="Banner Utama">
                        </div>
                    @endif
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-success fw-bold px-4 py-2 shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Banner
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection