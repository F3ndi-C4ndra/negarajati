@extends('layouts.app')

@section('content')

<section class="py-5 bg-success text-white">

    <div class="container text-center">

        <h1 class="fw-bold">
            Profil Desa Negarajati
        </h1>

        <p>
            Kecamatan Cimanggu, Kabupaten Cilacap
        </p>

    </div>

</section>

<section class="py-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-6">

                <h2 class="section-title">
                    Sejarah Desa
                </h2>

                <p>
                    Tuliskan sejarah Desa Negarajati di sini.
                </p>

            </div>

            <div class="col-lg-6">

                <img src="https://picsum.photos/600/400"
                     class="img-fluid rounded shadow">

            </div>

        </div>

    </div>

</section>

<section class="py-5 bg-light">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="card stat-card p-4">

                    <h3>Visi</h3>

                    <p>
                        Menjadi desa maju, mandiri, dan sejahtera.
                    </p>

                </div>

            </div>

            <div class="col-md-6">

                <div class="card stat-card p-4">

                    <h3>Misi</h3>

                    <ul>
                        <li>Meningkatkan pelayanan publik</li>
                        <li>Mengembangkan potensi desa</li>
                        <li>Meningkatkan kesejahteraan masyarakat</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection