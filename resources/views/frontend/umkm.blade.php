@extends('layouts.app')

@section('content')
<!-- BANNER HEADER -->
<div class="bg-success text-white py-5 mb-5 text-center">
    <div class="container py-3">
        <h1 class="display-5 fw-bold mb-2">Lapak Digital UMKM Negarajati</h1>
        <p class="lead mb-0 fs-6 text-light">Dukung perekonomian warga desa dengan membeli produk lokal terbaik.</p>
    </div>
</div>

<div class="container mb-5 pb-5">
    @if($umkms->isEmpty())
        <div class="alert alert-info border-0 shadow-sm p-4 rounded-3 text-center" role="alert">
            <i class="bi bi-shop fs-3 d-block mb-2"></i>
            <span class="fw-semibold">Belum ada produk UMKM yang terdaftar.</span>
        </div>
    @else
        <div class="row g-4">
            @foreach($umkms as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $item->nama_produk }}">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Produk+UMKM" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Produk UMKM">
                        @endif
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill align-self-start mb-2 px-3">
                                {{ $item->kategori ?? 'UMKM Desa' }}
                            </span>
                            <h5 class="fw-bold card-title mb-1">{{ $item->nama_produk }}</h5>
                            <small class="text-muted mb-2"><i class="bi bi-person me-1"></i> Pemilik: {{ $item->nama_pemilik }}</small>
                            <h6 class="fw-bold text-success fs-5 mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</h6>
                            <p class="card-text text-muted small mb-4 flex-grow-1">{{ Str::limit($item->deskripsi, 90) }}</p>
                            
                            @if($item->no_hp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_hp) }}?text=Halo%20{{ urlencode($item->nama_pemilik) }}%2C%20saya%20tertarik%20dengan%20produk%20{{ urlencode($item->nama_produk) }}" 
                                   target="_blank" class="btn btn-success fw-bold w-100 py-2 rounded-pill shadow-sm">
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