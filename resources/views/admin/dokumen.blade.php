@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark m-0">Kelola Produk Hukum & Dokumen</h3>
            <small class="text-muted">Unggah Peraturan Desa, SK Kades, dan Laporan Transparansi APBD Desa</small>
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
        <!-- Form Upload Dokumen -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
                <h5 class="fw-bold mb-3"><i class="bi bi-file-earmark-plus me-2"></i>Tambah Dokumen</h5>
                <form action="{{ route('admin.dokumen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Dokumen / Peraturan</label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Perdes No 3 Tahun 2025" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kategori</label>
                        <select name="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Peraturan Desa (Perdes)">Peraturan Desa (Perdes)</option>
                            <option value="SK Kepala Desa">SK Kepala Desa</option>
                            <option value="Transparansi APBD">Transparansi APBD</option>
                            <option value="Dokumen Lainnya">Dokumen Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tahun</label>
                        <input type="number" name="tahun" class="form-control" value="{{ date('Y') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">File Dokumen (PDF/Doc)</label>
                        <input type="file" name="file_dokumen" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx" required>
                        <small class="text-muted">Format: PDF, Word, Excel (Maks: 10MB)</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Keterangan Singkat</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Catatan/penjelasan dokumen..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark fw-bold w-100 shadow-sm">
                        Unggah Dokumen
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Dokumen -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 rounded-3 bg-white">
                <h5 class="fw-bold mb-3"><i class="bi bi-file-earmark-text me-2"></i>Daftar Produk Hukum & Dokumen</h5>

                @if($dokumens->isEmpty())
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-folder-x fs-1 d-block mb-2"></i>
                        <p class="m-0">Belum ada dokumen yang diunggah.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Judul & Kategori</th>
                                    <th>Tahun</th>
                                    <th>File</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dokumens as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong class="d-block text-dark">{{ $item->judul }}</strong>
                                            <span class="badge bg-secondary">{{ $item->kategori }}</span>
                                        </td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-download me-1"></i> Unduh
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.dokumen.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection