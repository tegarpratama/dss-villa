@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h4>Data Admin</h4>
                    </div>
                    <div class="col d-flex flex-row-reverse">
                        <a href="{{ route('admin.create') }}" class="btn btn-info">
                            Tambah
                        </a>
                    </div>
                </div>

                @if (session('status'))
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-success text-center mt-2 mb-2" role="alert">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row mt-4">
                    <div class="col">
                        <table class="table text-center">
                            <thead>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>{{ $admin->role }}</td>
                                        @if ($admin->id != auth()->user()->id )
                                            <td class="text-center">
                                                <form action="{{ route('admin.destroy', $admin->id) }}" method="POST" class="delete d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Hapus admin ini ?');" type="submit" class="btn btn-danger btn-sm">
                                                        <i class="icon-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <span class="badge badge-dark px-3">Anda</span>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Data Admin Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
