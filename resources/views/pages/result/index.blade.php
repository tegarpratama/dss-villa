@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Detail Data Nilai Penginapan</h4>
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
                        <th>Penginapan</th>
                        <th>Harga Sewa</th>
                        <th>Lokasi</th>
                        <th>Fasilitas</th>
                        <th>Kebersihan</th>
                        <th>Keamanan</th>
                    </thead>
                    <tbody>
                        @forelse ($results as $result)
                            <tr>
                                <td>{{ ($results->currentPage() - 1) * $results->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $result->villa->name }}</td>
                                <td>{{ $result->price_score }}</td>
                                <td>{{ $result->location_score }}</td>
                                <td>{{ $result->facility_score }}</td>
                                <td>{{ $result->hygiene_score }}</td>
                                <td>{{ $result->security_score }}</td>
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
