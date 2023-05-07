@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Ubah Data Kriteria Kebersihan</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <form action="{{ route('kebersihan.update', $hygiene) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $hygiene->id }}">
                            <div class="form-group">
                                <label>Variabel</label>
                                <input type="text" class="form-control" name="linguistic_value" value="{{ $hygiene->linguistic_value }}">
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $hygiene->score }}">
                                @error('score')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
