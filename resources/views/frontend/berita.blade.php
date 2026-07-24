@extends('layouts.app')

@section('content')
<!-- BANNER HEADER ELEGANT -->
<div class="py-5 text-white text-center mb-5" style="background: linear-gradient(135deg, #198754 0%, #0f5132 100%);">
    <div class="container py-3">
        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm text-uppercase">
            <i class="bi bi-newspaper me-1"></i> Publikasi
        </span>
        <h1 class="display-4 fw-bold mb-2">Kabar & Informasi Desa</h1>
        <p class="lead text-light mb-0 opacity-90">Dapatkan informasi berita, pengumuman, dan agenda kegiatan terbaru Desa Negarajati</p>
    </div>
</div>

<div class="container mb-5 pb-5">
    @if($beritas->isEmpty())
        <div class="alert alert-light border-0 shadow-sm p-5 rounded-4 text-center" role="alert">
            <i class="bi bi-newspaper text-success display-3 d-block mb-3"></i>
            <h5 class="fw-bold text-dark">Belum Ada Berita</h5>
            <p class="text-muted m-0">Belum ada berita atau kegiatan desa yang dipublikasikan.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach($beritas as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $item->judul }}">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Berita+Desa" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Berita Desa">
                        @endif
                        <div class="card-body p-4 d-flex flex-column">
                            <small class="text-success fw-semibold mb-2">
                                <i class="bi bi-calendar3 me-1"></i> {{ $item->created_at->format('d M Y') }}
                            </small>
                            <h5 class="fw-bold card-title mb-3 text-dark">{{ Str::limit($item->judul, 60) }}</h5>
                            <p class="card-text text-muted small mb-4 flex-grow-1 leading-relaxed">{{ Str::limit(strip_tags($item->isi), 110) }}</p>
                            <a href="{{ Route::has('berita.show') ? route('berita.show', $item->id) : '#' }}" class="btn btn-outline-success btn-sm fw-bold align-self-start rounded-pill px-3 py-2">
                                Baca Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection