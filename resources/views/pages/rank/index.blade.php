@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Ranking</h4>
            </div>
            <div class="col d-flex flex-row-reverse">
                <a href="{{ route('cetak.hasil') }}" class="btn btn-outline-dark">
                    <i class="icon-printer"></i>
                </a>
                <a href="{{ route('hasil.refresh') }}" class="btn btn-info mr-3">
                    <i class="icon-refresh mr-1"></i>
                    Refresh
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
                        <th>Total</th>
                        <th>Ranking</th>
                    </thead>
                    <tbody>
                        @forelse ($ranks as $rank)
                            <tr>
                                <td>{{ ($ranks->currentPage() - 1) * $ranks->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $rank->villa->name }}</td>
                                <td>{{ $rank->price_result }}</td>
                                <td>{{ $rank->location_result }}</td>
                                <td>{{ $rank->facility_result }}</td>
                                <td>{{ $rank->hygiene_result }}</td>
                                <td>{{ $rank->security_result }}</td>
                                <td>{{ $rank->total }}</td>
                                <td>{{ ($ranks->currentPage() - 1) * $ranks->perPage() + $loop->index + 1 }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data Ranking Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $ranks->links() }}
            </div>
        </div>
    </div>
@endsection
