@extends('layouts.app')

@section('content')
<!-- BANNER HEADER ELEGANT -->
<div class="py-5 text-white text-center mb-5" style="background: linear-gradient(135deg, #198754 0%, #0f5132 100%);">
    <div class="container py-3">
        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm text-uppercase">
            <i class="bi bi-search me-1"></i> Layanan Transparansi
        </span>
        <h1 class="display-5 fw-bold mb-2">Cek Status Pengaduan Warga</h1>
        <p class="lead text-light mb-0 opacity-90">Masukkan nomor WhatsApp/HP yang Anda gunakan saat mengirim aduan</p>
    </div>
</div>

<div class="container mb-5 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Form Pencarian -->
            <div class="card border-0 shadow-sm p-4 rounded-4 bg-white mb-4">
                <form action="{{ route('pengaduan.cek') }}" method="GET">
                    <label class="form-label fw-bold text-dark mb-2">Nomor WhatsApp / HP Pelapor</label>
                    <div class="input-group input-group-lg">
                        <input type="text" name="telepon" class="form-control rounded-start-3" placeholder="Contoh: 08123456789" value="{{ request('telepon') }}" required>
                        <button class="btn btn-success fw-bold px-4 rounded-end-3" type="submit">
                            <i class="bi bi-search me-1"></i> Cari Status
                        </button>
                    </div>
                </form>
            </div>

            <!-- Hasil Pencarian -->
            @if(request()->has('telepon'))
                <h5 class="fw-bold text-dark mb-3">Hasil Pencarian untuk: <span class="text-success">{{ $search }}</span></h5>

                @forelse($pengaduans as $item)
                    <div class="card border-0 shadow-sm rounded-4 mb-3 bg-white overflow-hidden">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold text-dark m-0">{{ $item->judul }}</h5>
                                
                                @if($item->status == 'Selesai')
                                    <span class="badge bg-success px-3 py-2 rounded-pill"><i class="bi bi-check-circle-fill me-1"></i> Selesai Ditangani</span>
                                @elseif($item->status == 'Diproses')
                                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill"><i class="bi bi-hourglass-split me-1"></i> Sedang Diproses</span>
                                @else
                                    <span class="badge bg-secondary px-3 py-2 rounded-pill"><i class="bi bi-clock-fill me-1"></i> Menunggu Verifikasi</span>
                                @endif
                            </div>

                            <small class="text-muted d-block mb-3"><i class="bi bi-calendar3 me-1"></i> Dikirim pada: {{ $item->created_at->format('d M Y, H:i') }} WIB</small>
                            
                            <div class="p-3 bg-light rounded-3 mb-3">
                                <strong class="d-block text-dark small mb-1">Isi Aduan Anda:</strong>
                                <p class="text-secondary m-0 small">{!! nl2br(e($item->isi)) !!}</p>
                            </div>

                            <!-- Tanggapan Admin/Pemerintah Desa -->
                            @if(!empty($item->tanggapan))
                                <div class="p-3 bg-success-subtle border border-success-subtle rounded-3">
                                    <strong class="d-block text-success small mb-1"><i class="bi bi-reply-fill me-1"></i> Tanggapan/Tindak Lanjut Perangkat Desa:</strong>
                                    <p class="text-dark m-0 small">{!! nl2br(e($item->tanggapan)) !!}</p>
                                </div>
                            @else
                                <small class="text-muted italic"><i class="bi bi-info-circle me-1"></i> Belum ada tanggapan tertulis dari pihak desa.</small>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="card border-0 shadow-sm p-5 text-center rounded-4 bg-white">
                        <i class="bi bi-emoji-frown display-4 text-muted mb-3"></i>
                        <h5 class="fw-bold text-dark">Data Pengaduan Tidak Ditemukan</h5>
                        <p class="text-muted m-0">Pastikan nomor WhatsApp yang Anda masukkan sama persis saat mengirimkan aduan.</p>
                    </div>
                @endforelse
            @endif
        </div>
    </div>
</div>
@endsection