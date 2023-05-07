@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Ubah Data Kriteria Fasilitas</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <form action="{{ route('fasilitas.update', $facility) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $facility->id }}">
                            <div class="form-group">
                                <label>Variabel</label>
                                <input type="text" class="form-control" name="linguistic_value" value="{{ $facility->linguistic_value }}">
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $facility->score }}">
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
