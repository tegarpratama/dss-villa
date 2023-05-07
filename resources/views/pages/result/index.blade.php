@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Detail Data Nilai Pelamar</h4>
            </div>
            <div class="col d-flex flex-row-reverse">
                <a href="{{ route('cetak.nilai') }}" class="btn btn-outline-dark">
                    <i class="icon-printer"></i>
                </a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <table class="table text-center">
                    <thead>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Pendidikan</th>
                        <th>Jurusan</th>
                        <th>Pengalaman</th>
                        <th>Wawancara</th>
                    </thead>
                    <tbody>
                        @forelse ($results as $result)
                            <tr>
                                <td>{{ ($results->currentPage() - 1) * $results->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $result->applicant->name }}</td>
                                <td>{{ $result->education_score }}</td>
                                <td>{{ $result->major_score }}</td>
                                <td>{{ $result->experience_score }}</td>
                                <td>{{ $result->interview_score }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data Nilai Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $results->links() }}
            </div>
        </div>
    </div>
@endsection
