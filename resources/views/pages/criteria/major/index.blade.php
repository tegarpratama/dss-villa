@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card p-4">
            <div class="row">
                <div class="col">
                    <h4>Data Kriteria Jurusan</h4>
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
                            <th>Jurusan</th>
                            <th>Nilai Linguistik</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($majors as $major)
                                <tr>
                                    <td>{{ $major->major }}</td>
                                    <td>{{ $major->linguistic_value }}</td>
                                    <td>{{ $major->score }}</td>
                                    <td>
                                        <a href="{{ route('jurusan.edit', $major->id) }}">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Data Kriteria Jurusan Kosong</td>
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
