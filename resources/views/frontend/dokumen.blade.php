@extends('layouts.app')

@section('content')
<!-- BANNER HEADER ELEGANT -->
<div class="py-5 text-white text-center mb-5" style="background: linear-gradient(135deg, #198754 0%, #0f5132 100%);">
    <div class="container py-3">
        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm text-uppercase">
            <i class="bi bi-file-earmark-text me-1"></i> Transparansi
        </span>
        <h1 class="display-4 fw-bold mb-2">Produk Hukum & Dokumen Resmi</h1>
        <p class="lead text-light mb-0 opacity-90">Akses berkas Peraturan Desa, SK Kades, dan laporan keterbukaan publik Desa Negarajati</p>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white p-4 p-md-5">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-success text-dark">
                    <tr>
                        <th class="py-3 px-3 text-center" style="width: 60px;">No</th>
                        <th class="py-3">Judul Dokumen / Peraturan Desa</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3 text-center">Tahun</th>
                        <th class="py-3 text-center" style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokumens ?? [] as $index => $dok)
                        <tr>
                            <td class="text-center fw-semibold text-muted py-3">{{ $index + 1 }}</td>
                            <td class="fw-bold text-dark py-3">{{ $dok->judul }}</td>
                            <td class="py-3"><span class="badge bg-light text-success border border-success-subtle px-3 py-2 rounded-pill">{{ $dok->kategori }}</span></td>
                            <td class="text-center py-3 fw-semibold text-secondary">{{ $dok->tahun }}</td>
                            <td class="text-center py-3">
                                @if($dok->file)
                                    <a href="{{ asset('storage/' . $dok->file) }}" target="_blank" class="btn btn-success btn-sm fw-bold px-3 rounded-pill shadow-sm">
                                        <i class="bi bi-download me-1"></i> Unduh
                                    </a>
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x display-4 d-block mb-3 text-secondary"></i>
                                <h6 class="fw-semibold">Belum Ada Dokumen Resmi</h6>
                                <small>Dokumen Peraturan Desa atau SK belum diunggah oleh pengelola.</small>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection