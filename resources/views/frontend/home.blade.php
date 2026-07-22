@extends('layouts.app')

@section('content')
<!-- 1. HERO SECTION (CLEAN DARK OVERLAY) -->
@php
    $bgHero = !empty($profil->hero_image) 
        ? asset('storage/' . $profil->hero_image) 
        : 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1600';
@endphp

<div class="position-relative text-white text-center py-5 d-flex align-items-center justify-content-center" 
     style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $bgHero }}') center/cover no-repeat; min-height: 500px;">
    <div class="container py-4">
        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 text-uppercase">Portal Resmi Pemerintah Desa</span>
        
        <h1 class="display-4 fw-bold mb-3">
            {!! nl2br(e($profil->hero_title ?? 'Selamat Datang di Portal Informasi Desa Negarajati')) !!}
        </h1>
        
        <p class="lead mb-4 fs-5 text-light">
            {{ $profil->hero_subtitle ?? 'Kecamatan Cimanggu, Kabupaten Cilacap, Jawa Tengah' }}
        </p>

        <!-- Search Bar -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ Route::has('berita.index') ? route('berita.index') : '#' }}" method="GET" class="input-group input-group-lg shadow-sm">
                    <input type="text" name="search" class="form-control border-0 px-4" placeholder="Cari informasi desa...">
                    <button class="btn btn-success px-4 fw-bold" type="submit">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 2. SAMBUTAN KEPALA DESA & PROFIL -->
<div class="container py-5">
    <div class="row align-items-center g-5">
        <div class="col-lg-4 text-center">
            @if(!empty($profil->foto_kades))
                <img src="{{ asset('storage/' . $profil->foto_kades) }}" class="img-fluid rounded-4 shadow" style="max-height: 380px; width: 100%; object-fit: cover;" alt="Foto Kades">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($profil->nama_kades ?? 'Sartono SH') }}&background=198754&color=fff&size=300" class="img-fluid rounded-4 shadow" alt="Foto Kades">
            @endif
            <h5 class="fw-bold mt-3 mb-0 text-dark">{{ $profil->nama_kades ?? 'Sartono, S.H.' }}</h5>
            <small class="text-muted fw-semibold">Kepala Desa Negarajati</small>
        </div>
        <div class="col-lg-8">
            <h6 class="text-success fw-bold text-uppercase">Sambutan Kepala Desa</h6>
            <h2 class="fw-bold mb-3 text-dark">Mewujudkan Tata Kelola Desa Negarajati yang Transparan & Digital</h2>
            <p class="text-muted leading-relaxed mb-4 fs-5">
                {{ $profil->sambutan_kades ?? 'Selamat datang di website resmi Desa Negarajati. Website ini hadir sebagai wujud transparansi publik dan kemudahan akses informasi serta pelayanan masyarakat Desa Negarajati secara online.' }}
            </p>
            <a href="{{ Route::has('profil') ? route('profil') : (Route::has('profil.index') ? route('profil.index') : '#') }}" class="btn btn-outline-success fw-bold px-4 py-2 rounded-pill">
                Baca Selengkapnya &rarr;
            </a>
        </div>
    </div>
</div>

<!-- 3. STATISTIK KEPENDUDUKAN -->
<div class="bg-light py-5 border-top border-bottom">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-success fw-bold text-uppercase">Data Desa</h6>
            <h3 class="fw-bold text-dark">Statistik Kependudukan Dinamis</h3>
            <p class="text-muted">Gambaran umum demografi warga Desa Negarajati secara real-time</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-2 col-6">
                <div class="card border-0 shadow-sm p-3 rounded-3 bg-white h-100">
                    <h2 class="fw-bold text-success mb-1">{{ number_format($statistik->total_warga ?? 0) }}</h2>
                    <small class="text-muted fw-semibold">Total Warga</small>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card border-0 shadow-sm p-3 rounded-3 bg-white h-100">
                    <h2 class="fw-bold text-primary mb-1">{{ number_format($statistik->laki_laki ?? 0) }}</h2>
                    <small class="text-muted fw-semibold">Laki-Laki</small>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card border-0 shadow-sm p-3 rounded-3 bg-white h-100">
                    <h2 class="fw-bold text-danger mb-1">{{ number_format($statistik->perempuan ?? 0) }}</h2>
                    <small class="text-muted fw-semibold">Perempuan</small>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card border-0 shadow-sm p-3 rounded-3 bg-white h-100">
                    <h2 class="fw-bold text-warning mb-1">{{ number_format($statistik->kepala_keluarga ?? 0) }}</h2>
                    <small class="text-muted fw-semibold">Kepala Keluarga</small>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card border-0 shadow-sm p-3 rounded-3 bg-white h-100">
                    <h2 class="fw-bold text-dark mb-1">{{ $statistik->rt ?? 0 }}</h2>
                    <small class="text-muted fw-semibold">Jumlah RT</small>
                </div>
            </div>
            <div class="col-md-2 col-6">
                <div class="card border-0 shadow-sm p-3 rounded-3 bg-white h-100">
                    <h2 class="fw-bold text-info mb-1">{{ $statistik->rw ?? 0 }}</h2>
                    <small class="text-muted fw-semibold">Jumlah RW</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 4. BERITA TERBARU DESA -->
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h6 class="text-success fw-bold text-uppercase m-0">Kabar Desa</h6>
            <h3 class="fw-bold text-dark m-0">Berita & Kegiatan Terbaru</h3>
        </div>
        <a href="{{ Route::has('berita.index') ? route('berita.index') : '#' }}" class="btn btn-success fw-bold px-3 py-2 rounded-pill">
            Lihat Semua Berita &rarr;
        </a>
    </div>

    <div class="row g-4">
        @forelse($beritas as $berita)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $berita->judul }}">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=Berita+Desa" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Berita">
                    @endif
                    <div class="card-body p-4 d-flex flex-column">
                        <small class="text-success fw-semibold mb-2"><i class="bi bi-calendar3 me-1"></i> {{ $berita->created_at->format('d M Y') }}</small>
                        <h5 class="fw-bold card-title mb-3 text-dark">{{ Str::limit($berita->judul, 50) }}</h5>
                        <p class="card-text text-muted small mb-4 flex-grow-1">{{ Str::limit(strip_tags($berita->isi), 100) }}</p>
                        <a href="{{ Route::has('berita.show') ? route('berita.show', $berita->id) : '#' }}" class="btn btn-outline-success btn-sm fw-bold align-self-start rounded-pill px-3">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-4 text-muted">
                <p>Belum ada berita terbaru yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- 5. LAPAK UMKM DESA -->
<div class="bg-light py-5 border-top border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h6 class="text-success fw-bold text-uppercase m-0">Ekonomi Lokal</h6>
                <h3 class="fw-bold text-dark m-0">Produk UMKM Desa Negarajati</h3>
            </div>
            <a href="{{ Route::has('umkm.index') ? route('umkm.index') : (Route::has('umkm') ? route('umkm') : '#') }}" class="btn btn-success fw-bold px-3 py-2 rounded-pill">
                Lihat Semua UMKM &rarr;
            </a>
        </div>

        <div class="row g-4">
            @forelse($umkms as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden bg-white">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $item->nama_produk }}">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Produk+UMKM" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Produk UMKM">
                        @endif
                        <div class="card-body p-4 d-flex flex-column">
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill align-self-start mb-2 px-3">
                                {{ $item->kategori ?? 'UMKM Desa' }}
                            </span>
                            <h5 class="fw-bold card-title mb-1 text-dark">{{ $item->nama_produk }}</h5>
                            <small class="text-muted mb-2"><i class="bi bi-person me-1"></i> Pemilik: {{ $item->nama_pemilik }}</small>
                            <h6 class="fw-bold text-success fs-5 mb-3">Rp {{ number_format($item->harga, 0, ',', '.') }}</h6>
                            <p class="card-text text-muted small mb-4 flex-grow-1">{{ Str::limit($item->deskripsi, 80) }}</p>
                            @if($item->no_hp)
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->no_hp) }}?text=Halo%20{{ urlencode($item->nama_pemilik) }}%2C%20saya%20tertarik%20dengan%20produk%20{{ urlencode($item->nama_produk) }}" 
                                   target="_blank" class="btn btn-success btn-sm fw-bold w-100 py-2 rounded-pill">
                                    <i class="bi bi-whatsapp me-1"></i> Hubungi Penjual
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4 text-muted">
                    <p>Belum ada produk UMKM yang ditampilkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- 6. LOKASI KANTOR DESA & JAM OPERASIONAL BALAI DESA -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h6 class="text-success fw-bold text-uppercase m-0">Pusat Pelayanan</h6>
        <h3 class="fw-bold text-dark m-0"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Lokasi & Jam Operasional Balai Desa</h3>
    </div>

    <div class="row g-4 align-items-stretch">
        <!-- Peta Google Maps -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100 p-2 bg-light">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15830.291772186982!2d108.8354!3d-7.3005!2m3!1f0!2f0!3f0!2m3!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f7902d338f05f%3A0x5027a76e356e3a0!2sNegarajati%2C%20Kec.%20Cimanggu%2C%20Kabupaten%20Cilacap%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" height="100%" style="border:0; min-height: 350px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-3"></iframe>
            </div>
        </div>

        <!-- Jam Buka Balai Desa -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-3 p-4 bg-light h-100 d-flex flex-column justify-content-between">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-3 p-3 me-3">
                            <i class="bi bi-clock-history fs-3"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark m-0">Jam Buka Balai Desa</h5>
                            <small class="text-muted">Pelayanan Masyarakat</small>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush mb-4 rounded-3 border-0">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-white py-3 px-3 border-bottom">
                            <span><i class="bi bi-calendar-check text-success me-2"></i>Senin - Kamis</span>
                            <span class="badge bg-success px-3 py-2">08:00 - 15:30 WIB</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-white py-3 px-3 border-bottom">
                            <span><i class="bi bi-calendar-check text-success me-2"></i>Jumat</span>
                            <span class="badge bg-success px-3 py-2">08:00 - 14:00 WIB</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-white py-3 px-3">
                            <span><i class="bi bi-calendar-x text-danger me-2"></i>Sabtu - Minggu</span>
                            <span class="badge bg-danger px-3 py-2">Libur</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-3 rounded-3 border">
                    <h6 class="fw-bold text-dark mb-1"><i class="bi bi-building me-2 text-success"></i>Alamat Kantor Desa:</h6>
                    <p class="text-muted small mb-0">{{ $profil->alamat_kantor ?? 'Jl. Telagasari No. 6, Desa Negarajati, Kec. Cimanggu, Kab. Cilacap, Jawa Tengah' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 7. PUSAT PENGADUAN WARGA (PALING BAWAH) -->
<div class="bg-light py-5 border-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-3 bg-white">
                    <div class="text-center mb-4">
                        <h4 class="fw-bold text-success mb-2"><i class="bi bi-chat-left-dots-fill me-2"></i>Pusat Pengaduan & Aspirasi Warga</h4>
                        <p class="text-muted small">Punya masukan atau aduan seputar pelayanan dan fasilitas Desa Negarajati? Kirimkan langsung di bawah ini.</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ Route::has('pengaduan.store') ? route('pengaduan.store') : '#' }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nomor WhatsApp / HP</label>
                                <input type="text" name="telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Judul Pengaduan / Aspirasi</label>
                                <input type="text" name="judul" class="form-control" placeholder="Contoh: Perbaikan PJU RT 02" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Isi Pengaduan / Detail Masalah</label>
                                <textarea name="isi" class="form-control" rows="4" placeholder="Jelaskan secara singkat aduan Anda..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-success fw-bold w-100 py-2 rounded-3 shadow-sm">
                                    <i class="bi bi-send me-1"></i> Kirim Pengaduan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection