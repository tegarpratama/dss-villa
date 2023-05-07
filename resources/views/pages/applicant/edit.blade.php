@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Ubah Data Pelamar</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <form action="{{ route('pelamar.update', $applicant->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : $applicant->name }}">
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
                                        @if ($education->id == $applicant->education_criteria_id)
                                            <option selected value="{{ $education->id }}">{{ $education->education }}</option>
                                        @else
                                            <option value="{{ $education->id }}">{{ $education->education }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select class="form-control" name="major_criteria_id">
                                    @foreach ($majors as $major)
                                        @if ($major->id === $applicant->major_criteria_id)
                                            <option selected value="{{ $major->id }}">{{ $major->major }}</option>
                                        @else
                                            <option value="{{ $major->id }}">{{ $major->major }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Pengalaman</label>
                                <select class="form-control" name="experience_criteria_id">
                                    @foreach ($experiences as $experience)
                                        @if ($experience->id == $applicant->experience_criteria_id)
                                            <option selected value="{{ $experience->id }}">{{ $experience->experience }}</option>
                                        @else
                                            <option value="{{ $experience->id }}">{{ $experience->experience }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Wawancara</label>
                                <input type="number" class="form-control @error('interview_score') is-invalid @enderror" name="interview_score" value="{{ old('interview_score') ? old('interview_score') : $applicant->interview_score }}">
                                @error('interview_score')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Perbaharui</button>
                </form>
            </div>
        </div>
    </div>
@endsection
