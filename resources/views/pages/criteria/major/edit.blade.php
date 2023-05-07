@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Ubah Data Kriteria Jurusan</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <form action="{{ route('jurusan.update', $major) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $major->id }}">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" class="form-control @error('major') is-invalid @enderror" name="major" value="{{ $major->major }}">
                                @error('major')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nilai Linguistik</label>
                                <input type="text" class="form-control" name="linguistic_value" value="{{ $major->linguistic_value }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $major->score }}">
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
