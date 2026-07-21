<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapak Digital UMKM - Desa Negarajati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="fw-bold text-success mb-2">Lapak Digital UMKM Negarajati</h2>
        <p class="text-muted mb-4">Dukung perekonomian warga desa dengan membeli produk lokal terbaik.</p>

        <div class="row g-4">
            @forelse($umkms as $item)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0 overflow-hidden">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white text-center py-5">Tidak Ada Foto</div>
                    @endif
                    <div class="card-body">
                        <h5 class="fw-bold mb-1">{{ $item->nama_usaha }}</h5>
                        <p class="small text-muted mb-2">Pemilik: {{ $item->pemilik }}</p>
                        <p class="card-text text-secondary">{{ $item->deskripsi }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->telepon) }}" target="_blank" class="btn btn-success w-100">
                            Hubungi Penjual (WhatsApp)
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12"><div class="alert alert-info">Belum ada produk UMKM yang terdaftar.</div></div>
            @endforelse
        </div>
    </div>
</body>
</html>