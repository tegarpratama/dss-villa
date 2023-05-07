@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Ubah Data Kriteria Pendidikan</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <form action="{{ route('pendidikan.update', $education) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $education->id }}">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <input type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ $education->education }}">
                                @error('education')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nilai Linguistik</label>
                                <input type="text" class="form-control" name="linguistic_value" value="{{ $education->linguistic_value }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $education->score }}">
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
