@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Data Penginapan</h4>
            </div>
            <div class="col d-flex flex-row-reverse">
                {{-- <a href="{{ route('cetak.penginapan') }}" class="btn btn-outline-dark">
                    <i class="icon-printer"></i>
                </a> --}}
                <a href="{{ route('penginapan.create') }}" class="btn btn-info mr-3">
                    Tambah
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="row mt-2">
                <div class="col">
                    <div class="alert alert-success text-center" role="alert">
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
                        <th>Nama</th>
                        <th>Lokasi</th>
                        <th>Harga</th>
                        <th>Fasilitas</th>
                        <th>Kebersihan</th>
                        <th>Keamanan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($villas as $v)
                            <tr>
                                <td>{{ ($villas->currentPage() - 1) * $villas->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $v->name }}</td>
                                <td>{{ $v->price->linguistic_value }}</td>
                                <td>{{ $v->location->linguistic_value }}</td>
                                <td>{{ $v->facility->linguistic_value }}</td>
                                <td>{{ $v->hygiene->linguistic_value }}</td>
                                <td>{{ $v->security->linguistic_value }}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm text-white" href="{{ route('penginapan.edit', $v->id) }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('penginapan.destroy', $v->id) }}" method="POST" class="delete d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Hapus penginapan ini ?');" type="submit" class="btn btn-danger btn-sm">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">Data penginapan Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $villas->links() }}
            </div>
        </div>
    </div>
@endsection
