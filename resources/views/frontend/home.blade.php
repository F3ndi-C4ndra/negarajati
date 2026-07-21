@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="py-5 text-white text-center position-relative" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://picsum.photos/1200/500?nature') no-repeat center center; background-size: cover;">
    <div class="container py-5">

        <span class="badge bg-warning text-dark px-3 py-2 mb-3 fw-bold">
            PORTAL RESMI PEMERINTAH DESA
        </span>

        <h1 class="display-4 fw-bold">
            Selamat Datang di Portal Informasi Desa Negarajati
        </h1>

        <p class="lead">
            Kecamatan Cimanggu, Kabupaten Cilacap, Jawa Tengah
        </p>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-6">
                <form action="{{ route('berita.index') }}" method="GET" class="input-group input-group-lg shadow-sm">
                    <input type="text" name="search" class="form-control border-0" placeholder="Cari informasi desa...">
                    <button type="submit" class="btn btn-success px-4 fw-bold">
                        Cari
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>

<!-- Sambutan Kepala Desa -->
<section class="py-5 bg-white">
    <div class="container">

        <h2 class="fw-bold text-success mb-4 border-bottom pb-2">
            Sambutan Kepala Desa
        </h2>

        <div class="row align-items-center g-4">

            <div class="col-lg-3 text-center">
                <div class="card border-0 shadow-sm p-3">
                    <img src="{{ asset('images/kades.jpg') }}" 
                         onerror="this.src='https://ui-avatars.com/api/?name=Sartono+SH&background=198754&color=fff&size=200'" 
                         alt="Kepala Desa Negarajati" 
                         class="img-fluid rounded shadow-sm mb-3" 
                         style="max-height: 250px; object-fit: cover;">

                    <h5 class="fw-bold mb-0">
                        Bp. Sartono, S.H.
                    </h5>

                    <small class="text-muted">Kepala Desa Negarajati</small>
                </div>
            </div>

            <div class="col-lg-9">

                <p class="fs-5 fst-italic text-success fw-semibold">
                    "Selamat datang di Website Resmi Desa Negarajati."
                </p>

                <p class="text-secondary leading-relaxed">
                    Website ini hadir sebagai media informasi, komunikasi, dan pelayanan publik bagi masyarakat Desa Negarajati.
                </p>

                <p class="text-secondary leading-relaxed">
                    Kami berkomitmen memberikan pelayanan yang transparan, akuntabel, dan mudah diakses oleh seluruh warga.
                </p>

            </div>

        </div>

    </div>
</section>

<!-- Statistik Kependudukan -->
<section class="py-5 bg-light">
    <div class="container">

        <h2 class="fw-bold text-success mb-4 border-bottom pb-2">
            Statistik Kependudukan
        </h2>

        <div class="row g-4">

            <!-- Card Total Warga -->
            <div class="col-md-12">
                <div class="card stat-card bg-success text-white text-center p-4 shadow-sm border-0 rounded-3">
                    <h5 class="fw-semibold">Total Warga Desa Negarajati</h5>
                    <h1 class="display-2 fw-bold my-2">
                        {{ number_format($statistik->total_warga ?? 0, 0, ',', '.') }}
                    </h1>
                    <p class="mb-0 text-white-50">Jiwa terdaftar · Data Terbaru</p>
                </div>
            </div>

            <!-- Card Laki-laki -->
            <div class="col-md-4">
                <div class="card text-center p-4 shadow-sm border-0 rounded-3 h-100">
                    <h2 class="fw-bold text-success">{{ number_format($statistik->laki_laki ?? 0, 0, ',', '.') }}</h2>
                    <p class="text-muted mb-0">Laki-laki</p>
                </div>
            </div>

            <!-- Card Perempuan -->
            <div class="col-md-4">
                <div class="card text-center p-4 shadow-sm border-0 rounded-3 h-100">
                    <h2 class="fw-bold text-success">{{ number_format($statistik->perempuan ?? 0, 0, ',', '.') }}</h2>
                    <p class="text-muted mb-0">Perempuan</p>
                </div>
            </div>

            <!-- Card Kepala Keluarga -->
            <div class="col-md-4">
                <div class="card text-center p-4 shadow-sm border-0 rounded-3 h-100">
                    <h2 class="fw-bold text-success">{{ number_format($statistik->kepala_keluarga ?? 0, 0, ',', '.') }}</h2>
                    <p class="text-muted mb-0">Kepala Keluarga (KK)</p>
                </div>
            </div>

            <!-- Card RW -->
            <div class="col-md-6">
                <div class="card text-center p-3 shadow-sm border-0 rounded-3">
                    <h3 class="fw-bold text-warning mb-0">{{ number_format($statistik->rw ?? 0, 0, ',', '.') }}</h3>
                    <small class="text-muted">Jumlah RW</small>
                </div>
            </div>

            <!-- Card RT -->
            <div class="col-md-6">
                <div class="card text-center p-3 shadow-sm border-0 rounded-3">
                    <h3 class="fw-bold text-warning mb-0">{{ number_format($statistik->rt ?? 0, 0, ',', '.') }}</h3>
                    <small class="text-muted">Jumlah RT</small>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Layanan & Informasi Desa -->
<section class="py-5 bg-white">
    <div class="container">

        <h2 class="fw-bold text-center text-success mb-5">
            Layanan & Informasi Desa
        </h2>

        <div class="row g-4">

            <div class="col-md-4">
                <a href="#map" class="text-decoration-none text-dark">
                    <div class="card text-center p-4 h-100 shadow-sm border-0 rounded-3 hover-shadow">
                        <div class="fs-1">🗺️</div>
                        <h5 class="mt-3 fw-bold">Peta Wilayah Desa</h5>
                        <p class="text-muted small mb-0">Navigasi dan batas wilayah Desa Negarajati</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('dokumen.index') }}" class="text-decoration-none text-dark">
                    <div class="card text-center p-4 h-100 shadow-sm border-0 rounded-3 hover-shadow">
                        <div class="fs-1">📄</div>
                        <h5 class="mt-3 fw-bold">Produk Hukum & SK</h5>
                        <p class="text-muted small mb-0">Akses Perdes, SK Kades, dan transparansi anggaran</p>
                    </div>
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('umkm.index') }}" class="text-decoration-none text-dark">
                    <div class="card text-center p-4 h-100 shadow-sm border-0 rounded-3 hover-shadow">
                        <div class="fs-1">🏪</div>
                        <h5 class="mt-3 fw-bold">UMKM Desa</h5>
                        <p class="text-muted small mb-0">Dukung dan temukan produk-produk lokal warga</p>
                    </div>
                </a>
            </div>

        </div>

    </div>
</section>

<!-- Berita Terbaru -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-success mb-0">
                Berita Terbaru
            </h2>
            <a href="{{ route('berita.index') }}" class="btn btn-outline-success btn-sm fw-semibold">Lihat Semua Berita</a>
        </div>

        <div class="row g-4">
            @forelse($beritas as $berita)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        @if($berita->gambar)
                            <img src="{{ asset('storage/'.$berita->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $berita->judul }}">
                        @else
                            <img src="https://picsum.photos/400/250?news={{ $loop->index }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Gambar Berita">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <small class="text-muted mb-2">
                                {{ $berita->created_at ? $berita->created_at->format('d M Y') : 'Terbaru' }}
                            </small>
                            <h5 class="fw-bold">{{ $berita->judul }}</h5>
                            <p class="text-secondary flex-grow-1">
                                {{ Str::limit(strip_tags($berita->isi), 100) }}
                            </p>
                            <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-sm btn-success w-100 mt-2">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4">
                    <div class="alert alert-info shadow-sm mb-0">
                        Belum ada berita yang diterbitkan.
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- Pusat Pengaduan Warga -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-bold mb-2">LAYANAN ADUAN</span>
                <h2 class="fw-bold mb-3">Pusat Pengaduan & Aspirasi Warga</h2>
                <p class="text-muted leading-relaxed">Pemerintah Desa Negarajati berkomitmen mendengar setiap aspirasi dan kendala warga. Sampaikan aduan Anda secara online, aman, dan langsung diproses petugas.</p>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-lg-7">
                <div class="card shadow-sm border-0 p-4 rounded-3 bg-light">
                    <form action="{{ route('pengaduan.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nomor WhatsApp/HP</label>
                                <input type="text" name="telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Judul Aduan / Aspirasi</label>
                                <input type="text" name="judul" class="form-control" placeholder="Contoh: Lampu Jalan RT 02 Mati" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Isi Pesan Aduan</label>
                                <textarea name="isi" class="form-control" rows="4" placeholder="Jelaskan detail lokasi dan masalahnya..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">Kirim Pengaduan Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Peta Leaflet & Pusat Operasional -->
<section class="py-5 bg-light" id="map-section">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- Peta Leaflet -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm overflow-hidden rounded-3">
                    <div id="map" style="height: 380px; width: 100%;"></div>
                </div>
            </div>

            <!-- Jam Operasional & Alamat -->
            <div class="col-lg-5">
                <h3 class="fw-bold mb-3">Pusat Koordinat & Operasional</h3>
                
                <p class="text-muted mb-4">
                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                    Jl. Telagasari No.6, Tlagasari, Negarajati, Kec. Cimanggu, Kab. Cilacap, Jawa Tengah 53256
                </p>

                <div class="card border-0 shadow-sm p-3 bg-white rounded-3">
                    <h5 class="fw-bold text-success mb-3">Jam Operasional Pelayanan</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            Senin - Kamis
                            <span class="badge bg-success">08:00 - 15:30 WIB</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            Jum'at
                            <span class="badge bg-success">08:00 - 11:00 WIB</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent text-muted">
                            Sabtu - Minggu
                            <span class="badge bg-danger">LIBUR</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CDN CSS & JS Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Koordinat Presisi Kantor Kepala Desa Negarajati
        var lat = -7.3071331;
        var lng = 108.8316878;

        var map = L.map('map').setView([lat, lng], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        L.marker([lat, lng]).addTo(map)
            .bindPopup('<b>Kantor Kepala Desa Negarajati</b><br>Jl. Telagasari No.6, Cimanggu')
            .openPopup();
    });
</script>

@endsection