@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Ubah Password Anda</h4>
                    </div>
                </div>

                @if (session('status'))
                    <div class="row mt-1">
                        <div class="col">
                            <div class="alert alert-success text-center" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="col">
                        <form action="{{ route('profile.update', auth()->user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirm">
                                @error('password_confirm')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
