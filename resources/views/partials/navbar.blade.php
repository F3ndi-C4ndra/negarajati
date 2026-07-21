<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">

        <!-- Logo / Brand Desa Negarajati -->
        <a class="navbar-brand fw-bold text-success d-flex align-items-center" href="{{ route('home') }}">
            <span>Desa Negarajati</span>
        </a>

        <!-- Tombol Toggler untuk Tampilan Mobile -->
        <button class="navbar-toggler border-0" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#menu" 
                aria-controls="menu" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigation -->
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-semibold">

                <!-- Beranda -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active text-success fw-bold' : '' }}" 
                       href="{{ route('home') }}">Beranda</a>
                </li>

                <!-- Profil Desa -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('profil') ? 'active text-success fw-bold' : '' }}" 
                       href="/profil">Profil Desa</a>
                </li>

                <!-- Berita -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita*') ? 'active text-success fw-bold' : '' }}" 
                       href="/berita">Berita</a>
                </li>

                <!-- Lapak UMKM Desa -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('umkm*') ? 'active text-success fw-bold' : '' }}" 
                       href="{{ route('umkm.index') }}">UMKM Desa</a>
                </li>

                <!-- Produk Hukum & Dokumen Transparansi -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dokumen*') ? 'active text-success fw-bold' : '' }}" 
                       href="{{ route('dokumen.index') }}">Produk Hukum</a>
                </li>

                <!-- Tombol Shortcut Dashboard Admin -->
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-outline-success btn-sm px-3 rounded-pill mt-1 mt-lg-0" 
                       href="/admin">Admin Panel</a>
                </li>

            </ul>
        </div>

    </div>
</nav>