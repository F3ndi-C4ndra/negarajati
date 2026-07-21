@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <h1 class="mb-3">
                {{ $berita->judul }}
            </h1>

            <p class="text-muted">
                {{ $berita->created_at->format('d F Y') }}
            </p>

            @if($berita->gambar)

            <img
                src="{{ asset('storage/'.$berita->gambar) }}"
                class="img-fluid rounded mb-4">

            @endif

            <div style="line-height:1.8">
                {!! nl2br(e($berita->isi)) !!}
            </div>

            <a href="/berita" class="btn btn-success mt-4">
                ← Kembali
            </a>

        </div>

    </div>

</div>

@endsection