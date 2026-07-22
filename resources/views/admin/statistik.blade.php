@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-success m-0">Kelola Statistik Kependudukan</h3>
            <small class="text-muted">Atur data jumlah warga dan statistik desa yang tampil di halaman depan</small>
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

    <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
        <form action="{{ route('admin.statistik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Total Warga (Jiwa)</label>
                    <input type="number" name="total_warga" class="form-control" value="{{ old('total_warga', $statistik->total_warga ?? 0) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Kepala Keluarga (KK)</label>
                    <input type="number" name="kepala_keluarga" class="form-control" value="{{ old('kepala_keluarga', $statistik->kepala_keluarga ?? 0) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jumlah Laki-laki</label>
                    <input type="number" name="laki_laki" class="form-control" value="{{ old('laki_laki', $statistik->laki_laki ?? 0) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jumlah Perempuan</label>
                    <input type="number" name="perempuan" class="form-control" value="{{ old('perempuan', $statistik->perempuan ?? 0) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jumlah RT</label>
                    <input type="number" name="rt" class="form-control" value="{{ old('rt', $statistik->rt ?? 0) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jumlah RW</label>
                    <input type="number" name="rw" class="form-control" value="{{ old('rw', $statistik->rw ?? 0) }}" required>
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-success fw-bold px-4 py-2 shadow-sm">
                        Simpan Perubahan Statistik
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection