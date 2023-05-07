@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Ubah Data Kriteria Wawancara</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <form action="{{ route('wawancara.update', $interview) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $interview->id }}">
                            <div class="form-group">
                                <label>Parameter Ukuran</label>
                                <div class="row">
                                    <div class="col">
                                        <label>Nilai Terkecil</label>
                                        <input type="text" class="form-control @error('min_param') is-invalid @enderror" name="min_param" value="{{ $interview->min_param }}">
                                        @error('min_param')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label>Nilai Terbesar</label>
                                        <input type="text" class="form-control @error('max_param') is-invalid @enderror" name="max_param" value="{{ $interview->max_param }}">
                                        @error('max_param')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nilai Linguistik</label>
                                <input type="text" class="form-control" name="linguistic_value" value="{{ $interview->linguistic_value }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $interview->score }}">
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
