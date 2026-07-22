@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-success m-0">Kelola Profil Desa</h3>
            <small class="text-muted">Atur informasi profil, sambutan Kepala Desa, Visi & Misi Desa Negarajati</small>
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
        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h5 class="fw-bold text-dark mb-3">
                <i class="bi bi-person-lines-fill me-2"></i>Informasi & Profil Desa
            </h5>
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Nama Kepala Desa</label>
                    <input type="text" name="nama_kades" class="form-control" value="{{ old('nama_kades', $profil->nama_kades ?? 'Sartono, S.H.') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Foto Kepala Desa</label>
                    <input type="file" name="foto_kades" class="form-control" accept="image/*">
                    <small class="text-muted">Format JPG/PNG (Maks 2MB). Biarkan kosong jika tidak diubah.</small>
                    @if(!empty($profil->foto_kades))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $profil->foto_kades) }}" class="img-thumbnail rounded" style="height: 100px; object-fit: cover;" alt="Foto Kades">
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Sambutan Kepala Desa</label>
                    <textarea name="sambutan_kades" class="form-control" rows="4">{{ old('sambutan_kades', $profil->sambutan_kades ?? '') }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">Sejarah Singkat Desa</label>
                    <textarea name="sejarah_desa" class="form-control" rows="4">{{ old('sejarah_desa', $profil->sejarah_desa ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Visi Desa</label>
                    <textarea name="visi" class="form-control" rows="3">{{ old('visi', $profil->visi ?? '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Misi Desa</label>
                    <textarea name="misi" class="form-control" rows="3">{{ old('misi', $profil->misi ?? '') }}</textarea>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Alamat Kantor Desa</label>
                    <input type="text" name="alamat_kantor" class="form-control" value="{{ old('alamat_kantor', $profil->alamat_kantor ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">No. Telepon / WhatsApp</label>
                    <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon', $profil->no_telepon ?? '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Email Desa</label>
                    <input type="email" name="email_desa" class="form-control" value="{{ old('email_desa', $profil->email_desa ?? '') }}">
                </div>

                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-success fw-bold px-4 py-2 shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan Profil Desa
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection