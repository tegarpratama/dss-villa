@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col">
        <div class="card p-4">
            <div class="row">
                <div class="col">
                    <h4>Data Kriteria Harga Sewa</h4>
                </div>
            </div>

            @if (session('status'))
                <div class="row mt-2">
                    <div class="col">
                        <div class="alert alert-success text-center" role="alert">
                            <strong>{{ session('status') }}</strong>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row mt-4">
                <div class="col">
                    <table class="table text-center">
                        <thead>
                            <th>Variabel</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($price as $p)
                                <tr>
                                    <td>{{ $p->linguistic_value }}</td>
                                    <td>{{ $p->score }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm text-white" href="{{ route('harga.edit', $p->id) }}">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Data Kriteria Harga Sewa Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
