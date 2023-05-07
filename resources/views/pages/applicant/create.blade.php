@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Tambah Data Pelamar</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <form action="{{ route('pelamar.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control" name="education_criteria_id">
                                    @foreach ($educations as $education)
                                        <option value="{{ $education->id }}">{{ $education->education }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" name="major_criteria_id">
                                    @foreach ($majors as $major)
                                        <option value="{{ $major->id }}">{{ $major->major }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Pengalaman</label>
                                <select class="form-control" name="experience_criteria_id">
                                    @foreach ($experiences as $experience)
                                        <option value="{{ $experience->id }}">{{ $experience->experience }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Wawancara</label>
                                <input type="number" class="form-control @error('name') is-invalid @enderror" name="interview_score">
                                @error('interview_score')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
