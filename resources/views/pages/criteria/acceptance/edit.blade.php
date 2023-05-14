@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Ubah Data Master Kriteria</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <form action="{{ route('penerimaan.update', $acceptance) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $acceptance->id }}">
                            <div class="form-group">
                                <label>ID Kriteria</label>
                                <input type="text" class="form-control" name="code" value="{{ $acceptance->code }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Kriteria</label>
                                <input type="text" class="form-control" name="criteria" value="{{ $acceptance->criteria }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="text" class="form-control @error('score') is-invalid @enderror" name="score" value="{{ $acceptance->score }}">
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
