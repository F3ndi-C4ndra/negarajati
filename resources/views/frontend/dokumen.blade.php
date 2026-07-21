@extends('layouts.app')

@section('content')

<section class="py-5 bg-success text-white">
    <div class="container text-center">
        <h1 class="fw-bold">Produk Hukum & Transparansi Desa</h1>
        <p>Akses dokumen resmi Peraturan Desa, SK Kades, dan Laporan Keterbukaan Informasi Publik Desa Negarajati</p>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="card border-0 shadow-sm p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success">
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Judul Dokumen / Peraturan</th>
                            <th>Kategori</th>
                            <th style="width: 100px;">Tahun</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokumens as $key => $doc)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-bold">{{ $doc['judul'] }}</td>
                            <td><span class="badge bg-info text-dark">{{ $doc['kategori'] }}</span></td>
                            <td>{{ $doc['tahun'] }}</td>
                            <td>
                                <a href="{{ $doc['file'] }}" class="btn btn-sm btn-outline-success fw-semibold">
                                    Unduh PDF
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada dokumen yang diunggah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection