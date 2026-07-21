<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pengaduan Warga - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Pengaduan & Aspirasi Warga</h2>
            <a href="/admin" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama & Kontak</th>
                    <th>Judul & Isi Aduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduans as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <strong>{{ $item->nama }}</strong><br>
                        <small class="text-muted">{{ $item->telepon }}</small>
                    </td>
                    <td>
                        <strong>{{ $item->judul }}</strong>
                        <p class="mb-0 text-muted small">{{ $item->isi }}</p>
                    </td>
                    <td>
                        <form action="/admin/pengaduan/{{ $item->id }}/status" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-select form-select-sm mb-1" onchange="this.form.submit()">
                                <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <form action="/admin/pengaduan/{{ $item->id }}" method="POST" onsubmit="return confirm('Hapus aduan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pengaduan masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>