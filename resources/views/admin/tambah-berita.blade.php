@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1 class="mb-4">
        Tambah Berita
    </h1>

    <div class="card">

        <div class="card-body">

            <form action="/admin/berita"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input type="text"
                           name="judul"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea class="form-control"
                              rows="6"
                              name="isi"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Gambar
                    </label>

                    <input type="file"
                           name="gambar"
                           class="form-control">
                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

@endsection