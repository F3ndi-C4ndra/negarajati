@extends('layouts.app')

@section('content')
<!-- BANNER HEADER ELEGANT -->
<div class="py-5 text-white text-center mb-5" style="background: linear-gradient(135deg, #198754 0%, #0f5132 100%);">
    <div class="container py-3">
        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm text-uppercase">
            <i class="bi bi-shop me-1"></i> Ekonomi Lokal
        </span>
        <h1 class="display-4 fw-bold mb-2">Lapak Digital UMKM Negarajati</h1>
        <p class="lead text-light mb-0 opacity-90">Dukung perekonomian warga desa dengan membeli produk-produk unggulan lokal terbaik</p>
    </div>
</div>

<div class="container mb-5 pb-5">
    @if($umkms->isEmpty())
        <div class="alert alert-light border-0 shadow-sm p-5 rounded-4 text-center" role="alert">
            <i class="bi bi-shop-window text-success display-3 d-block mb-3"></i>
            <h5 class="fw-bold text-dark">Belum Ada Produk UMKM</h5>
            <p class="text-muted m-0">Produk UMKM lokal Desa Negarajati belum terdaftar di sistem.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach($umkms as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        <div class="position-relative">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 230px; object-fit: cover;" alt="{{ $item->nama_produk }}">
                            @else
                                <img src="https://via.placeholder.com/600x400?text=Produk+UMKM" class="card-img-top" style="height: 230px; object-fit: cover;" alt="Produk UMKM">
                            @endif
                            <span class="position-absolute top-0 start-0 m-3 badge bg-success px-3 py-2 rounded-pill shadow-sm">
                                {{ $item->kategori ?? 'UMKM Desa' }}
                            </span>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold card-title mb-1 text-dark">{{ $item->nama_produk }}</h5>
                            <small class="text-muted mb-3"><i class="bi bi-person-fill text-success me-1"></i> Pemilik: <strong>{{ $item->nama_pemilik }}</strong></small>
                            
                            <h4 class="fw-bold text-success mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</h4>
                            <p class="card-text text-muted small mb-4 flex-grow-1 leading-relaxed">{{ Str::limit($item->deskripsi, 100) }}</p>
                            
                            @if($item->no_hp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_hp) }}?text=Halo%20{{ urlencode($item->nama_pemilik) }}%2C%20saya%20tertarik%20dengan%20produk%20{{ urlencode($item->nama_produk) }}" 
                                   target="_blank" class="btn btn-success fw-bold w-100 py-2.5 rounded-pill shadow-sm">
                                    <i class="bi bi-whatsapp me-2"></i> Hubungi Penjual
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection