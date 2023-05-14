@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Data Master Kriteria</h4>
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

                <div class="row mt-3">
                    <div class="col">
                        <table class="table text-center">
                            <thead>
                                <th>ID Kriteria</th>
                                <th>Kriteria</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($acceptances as $acceptance)
                                    <tr>
                                        <td>{{ $acceptance->code }}</td>
                                        <td>{{ $acceptance->criteria }}</td>
                                        <td>{{ $acceptance->score }}</td>
                                        <td>
                                            <a class="btn btn-warning text-white btn-sm" href="{{ route('penerimaan.edit', $acceptance->id) }}">
                                                <i class="icon-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Data Kriteria Tidak Ada</td>
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
