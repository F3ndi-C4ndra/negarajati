@extends('layouts.app')

@section('content')
<!-- Custom Style Ringan -->
<style>
    .profil-hero {
        background: linear-gradient(135deg, #198754 0%, #0f5132 100%);
        color: white;
    }
    .card-visi-misi {
        border-left: 5px solid #198754;
    }
</style>

<!-- 1. BANNER HEADER ELEGANT -->
<div class="profil-hero py-5 text-center mb-5">
    <div class="container py-3">
        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm text-uppercase">
            <i class="bi bi-info-circle me-1"></i> Mengenal Lebih Dekat
        </span>
        <h1 class="display-4 fw-bold mb-2">Profil Desa Negarajati</h1>
        <p class="lead text-light mb-0 opacity-90">Kecamatan Cimanggu, Kabupaten Cilacap, Jawa Tengah</p>
    </div>
</div>

<div class="container mb-5 pb-4">
    <!-- 2. SEJARAH DESA -->
    <div class="row align-items-center g-5 mb-5 pb-4">
        <div class="col-lg-6">
            <div class="pe-lg-3">
                <span class="text-success fw-bold text-uppercase small d-block mb-1">Jejak Langkah</span>
                <h2 class="fw-bold text-dark mb-3">Sejarah Singkat Desa</h2>
                <hr class="w-25 text-success mb-4" style="height: 3px; opacity: 1;">
                
                <div class="text-secondary leading-relaxed fs-6">
                    @if(!empty($profil->sejarah_desa))
                        {!! nl2br(e($profil->sejarah_desa)) !!}
                    @else
                        <p class="text-muted italic">
                            Desa Negarajati merupakan salah satu desa yang terletak di Kecamatan Cimanggu, Kabupaten Cilacap. Memiliki kekayaan alam dan budaya yang luhur, Desa Negarajati terus berkembang menjadi desa yang mandiri, sejahtera, dan transparan dalam memberikan pelayanan kepada masyarakat.
                        </p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="position-relative p-2 bg-white rounded-4 shadow-lg border">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1000" class="img-fluid rounded-3" style="max-height: 400px; width: 100%; object-fit: cover;" alt="Pemandangan Desa Negarajati">
            </div>
        </div>
    </div>

    <!-- 3. VISI & MISI DESA -->
    <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm border mb-5">
        <div class="text-center mb-5">
            <span class="text-success fw-bold text-uppercase small">Arah Pembangunan</span>
            <h2 class="fw-bold text-dark m-0">Visi & Misi Desa</h2>
        </div>

        <div class="row g-4">
            <!-- Visi -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-3 bg-white card-visi-misi">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                            <i class="bi bi-eye-fill fs-4"></i>
                        </div>
                        <h4 class="fw-bold text-dark m-0">Visi Desa</h4>
                    </div>
                    <p class="text-secondary leading-relaxed mb-0 fs-5">
                        "{{ $profil->visi ?? 'Terwujudnya Desa Negarajati yang Mandiri, Sejahtera, Transparan, dan Berdaya Saing Berbasis Potensi Lokal.' }}"
                    </p>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-3 bg-white card-visi-misi">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                            <i class="bi bi-bullseye fs-4"></i>
                        </div>
                        <h4 class="fw-bold text-dark m-0">Misi Desa</h4>
                    </div>
                    <div class="text-secondary leading-relaxed mb-0">
                        @if(!empty($profil->misi))
                            {!! nl2br(e($profil->misi)) !!}
                        @else
                            <ol class="ps-3 mb-0">
                                <li class="mb-2">Meningkatkan kualitas pelayanan publik dan transparansi tata kelola pemerintahan desa.</li>
                                <li class="mb-2">Mendorong pemberdayaan ekonomi masyarakat berbasis UMKM dan potensi lokal.</li>
                                <li class="mb-2">Pembangunan infrastruktur desa yang merata, berkelanjutan, dan berwawasan lingkungan.</li>
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. APARATUR & KONTAK DESA -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex align-items-center">
                    @if(!empty($profil->foto_kades))
                        <img src="{{ asset('storage/' . $profil->foto_kades) }}" class="rounded-3 me-3" style="width: 90px; height: 110px; object-fit: cover;" alt="Kades">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($profil->nama_kades ?? 'Sartono SH') }}&background=198754&color=fff&size=200" class="rounded-3 me-3" style="width: 90px; height: 110px; object-fit: cover;" alt="Kades">
                    @endif
                    <div>
                        <span class="badge bg-success-subtle text-success mb-1">Kepala Desa Negarajati</span>
                        <h5 class="fw-bold text-dark mb-1">{{ $profil->nama_kades ?? 'Sartono, S.H.' }}</h5>
                        <small class="text-muted d-block">Memimpin Desa Negarajati menuju tata kelola pemerintahan yang transparan dan melayani warga secara prima.</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100 d-flex flex-column justify-content-center">
                <h5 class="fw-bold text-dark mb-3"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Kontak & Alamat Kantor</h5>
                <p class="text-muted small mb-2"><i class="bi bi-building me-2 text-success"></i>{{ $profil->alamat_kantor ?? 'Jl. Telagasari No. 6, Desa Negarajati, Kec. Cimanggu, Kab. Cilacap, Jawa Tengah' }}</p>
                @if(!empty($profil->no_telepon))
                    <p class="text-muted small mb-2"><i class="bi bi-whatsapp me-2 text-success"></i>{{ $profil->no_telepon }}</p>
                @endif
                @if(!empty($profil->email_desa))
                    <p class="text-muted small mb-0"><i class="bi bi-envelope me-2 text-success"></i>{{ $profil->email_desa }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection