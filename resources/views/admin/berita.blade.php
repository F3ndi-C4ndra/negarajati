@extends('layouts.app')

@section('content')

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">
            Kelola Berita
        </h1>

        <a href="/admin/berita/create" class="btn btn-success">
            + Tambah Berita
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-striped table-hover align-middle">

                <thead>
                    <tr>
                        <th width="70">No</th>
                        <th>Judul Berita</th>
                        <th width="180">Tanggal</th>
                        <th width="200">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($beritas as $berita)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $berita->judul }}
                            </td>

                            <td>
                                {{ $berita->created_at->format('d M Y') }}
                            </td>

                            <td>

                                <a href="/admin/berita/{{ $berita->id }}/edit"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="/admin/berita/{{ $berita->id }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-4">
                                Belum ada berita.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection