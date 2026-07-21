<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola UMKM - Admin Desa Negarajati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kelola Lapak Digital UMKM</h2>
            <a href="/admin" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card mb-4 border-0 bg-light p-3">
            <h5 class="fw-bold mb-3">Tambah Produk UMKM Baru</h5>
            <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Usaha / Produk</label>
                        <input type="text" name="nama_usaha" class="form-control" placeholder="Contoh: Keripik Singkong Gurih" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Pemilik</label>
                        <input type="text" name="pemilik" class="form-control" placeholder="Nama Pemilik Usaha" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nomor WhatsApp/HP</label>
                        <input type="text" name="telepon" class="form-control" placeholder="08xxxxxxxxxx" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Foto Produk</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Deskripsi Usaha</label>
                        <textarea name="deskripsi" class="form-control" rows="2" placeholder="Jelaskan singkat tentang produk ini..." required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success fw-bold">Simpan Produk UMKM</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Usaha & Pemilik</th>
                    <th>Kontak WA</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($umkms as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td style="width: 100px;">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid rounded" style="max-height: 60px;">
                        @else
                            <span class="text-muted small">No Image</span>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $item->nama_usaha }}</strong><br>
                        <small class="text-muted">Pemilik: {{ $item->pemilik }}</small>
                    </td>
                    <td>{{ $item->telepon }}</td>
                    <td>
                        <form action="{{ route('admin.umkm.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada produk UMKM terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>