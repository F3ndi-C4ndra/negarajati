@extends('layouts.app')

@section('content')

<section class="py-5 bg-success text-white">
    <div class="container text-center">
        <h1 class="fw-bold">
            Berita Desa
        </h1>
        <p>
            Informasi dan kegiatan terbaru Desa Negarajati
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">

            @forelse($beritas as $item)
                <div class="col-lg-4">
                    <div class="card h-100 shadow-sm border-0">
                        
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $item->judul }}">
                        @else
                            <img src="https://picsum.photos/500/300" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Gambar Berita">
                        @endif

                        <div class="card-body d-flex flex-column">
                            
                            <small class="text-muted">
                                {{ $item->created_at ? $item->created_at->format('d F Y') : 'Terbaru' }}
                            </small>

                            <h5 class="mt-2 fw-bold">
                                {{ $item->judul }}
                            </h5>

                            <p class="text-secondary flex-grow-1">
                                {{ Str::limit(strip_tags($item->isi), 100) }}
                            </p>

                            <a href="{{ route('berita.show', $item->id) }}" class="btn btn-success w-100 mt-2">
                                Baca Selengkapnya
                            </a>

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info shadow-sm">
                        Belum ada berita yang diterbitkan saat ini.
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>

@endsection