@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Tambah Data User</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="admin" name="role" checked>
                            <label class="form-check-label" for="inlineCheckbox1">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="user" name="role">
                            <label class="form-check-label" for="inlineCheckbox2">User</label>
                        </div>
                    </div>
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
@endsection
