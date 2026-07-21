@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1 class="mb-4">
        Edit Berita
    </h1>

    <div class="card">

        <div class="card-body">

            <form action="/admin/berita/{{ $berita->id }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        name="judul"
                        value="{{ $berita->judul }}"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Isi Berita
                    </label>

                    <textarea
                        name="isi"
                        rows="8"
                        class="form-control">{{ $berita->isi }}</textarea>

                </div>

                <button class="btn btn-success">
                    Update Berita
                </button>

            </form>

        </div>

    </div>

</div>

@endsection