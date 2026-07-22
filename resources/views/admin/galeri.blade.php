@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-primary m-0">Kelola Galeri Foto Desa</h3>
            <small class="text-muted">Unggah dan kelola dokumentasi foto kegiatan Desa Negarajati</small>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary fw-semibold">
            &larr; Kembali ke Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <!-- Form Upload Foto Baru -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
                <h5 class="fw-bold mb-3"><i class="bi bi-upload me-2"></i>Tambah Foto</h5>
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul / Kegiatan</label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Kerja Bakti RT 02" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">File Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG (Maks: 2MB)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan Singkat</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Catatan/penjelasan foto..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary fw-bold w-100 shadow-sm">
                        Simpan Foto
                    </button>
                </form>
            </div>
        </div>

        <!-- Daftar Foto Galeri -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
                <h5 class="fw-bold mb-3"><i class="bi bi-images me-2"></i>Koleksi Foto Desa</h5>
                
                @if($galeris->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-image fs-1 d-block mb-2"></i>
                        <p class="m-0">Belum ada foto yang diunggah.</p>
                    </div>
                @else
                    <div class="row g-3">
                        @foreach($galeris as $item)
                            <div class="col-md-6">
                                <div class="card h-100 border shadow-sm rounded-3 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $item->judul }}">
                                    <div class="card-body p-3">
                                        <h6 class="fw-bold mb-1">{{ $item->judul }}</h6>
                                        <p class="text-muted small mb-2">{{ $item->keterangan ?? 'Tidak ada keterangan.' }}</p>
                                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                            <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                                            <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm px-2 py-1">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection