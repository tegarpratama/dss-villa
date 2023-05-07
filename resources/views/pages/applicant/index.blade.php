@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Detail Data Pelamar</h4>
            </div>
            <div class="col d-flex flex-row-reverse">
                <a href="{{ route('cetak.pelamar') }}" class="btn btn-outline-dark">
                    <i class="icon-printer"></i>
                </a>
                <a href="{{ route('pelamar.create') }}" class="btn btn-info mr-3">
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
                        <th>Pendidikan Terakhir</th>
                        <th>Jurusan</th>
                        <th>Pengalaman</th>
                        <th>Wawancara</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($applicants as $applicant)
                            <tr>
                                <td>{{ ($applicants->currentPage() - 1) * $applicants->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $applicant->name }}</td>
                                <td>{{ $applicant->education->education }}</td>
                                <td>{{ $applicant->major->major }}</td>
                                <td>{{ $applicant->experience->experience }}</td>
                                <td>{{ $applicant->interview_score }}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm text-white" href="{{ route('pelamar.edit', $applicant->id) }}">
                                        <i class="icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('pelamar.destroy', $applicant->id) }}" method="POST" class="delete d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Hapus pelamar ini ?');" type="submit" class="btn btn-danger btn-sm">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data Pelamar Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $applicants->links() }}
            </div>
        </div>
    </div>
@endsection
