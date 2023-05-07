@extends('layouts.main')

@section('content')
<div class="card p-3">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Selamat Datang</h2>
            <h4 class="text-center">Di Sistem Pendukung Rekomendasi Penginapan di Kawasan Pariwisata Puncak Bogor dengan Metode Simple Additive Weighting (SAW)</h4>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Villa</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $villas }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-home"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Kriteria</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">5</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-table"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Jumlah Admin/User</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">{{ $admins }}</h2>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-user"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
