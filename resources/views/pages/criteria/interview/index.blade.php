@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-8">
        <div class="card p-4">
            <div class="row">
                <div class="col">
                    <h4>Data Kriteria Interview</h4>
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
                            <th>Parameter Ukuran</th>
                            <th>Nilai Linguistik</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($interviews as $interview)
                                <tr>
                                    <td>{{ $interview->min_param }} - {{ $interview->max_param }}</td>
                                    <td>{{ $interview->linguistic_value }}</td>
                                    <td>{{ $interview->score }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm text-white" href="{{ route('wawancara.edit', $interview->id) }}">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Data Kriteria Interview Kosong</td>
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
