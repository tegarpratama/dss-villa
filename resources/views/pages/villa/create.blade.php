@extends('layouts.main')

@section('content')
    <div class="card p-4">
        <div class="row">
            <div class="col">
                <h4>Tambah Data Penginapan</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <form action="{{ route('penginapan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Harga Sewa</label>
                                <select class="form-control" name="price_criteria_id">
                                    @foreach ($prices as $price)
                                        <option value="{{ $price->id }}">{{ $price->linguistic_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <select class="form-control" name="location_criteria_id">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->linguistic_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <select class="form-control" name="facility_criteria_id">
                                    @foreach ($facilities as $facility)
                                        <option value="{{ $facility->id }}">{{ $facility->linguistic_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Kebersihan</label>
                                <select class="form-control" name="hygiene_criteria_id">
                                    @foreach ($hygienes as $hygiene)
                                        <option value="{{ $hygiene->id }}">{{ $hygiene->linguistic_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Keamanan</label>
                                <select class="form-control" name="security_criteria_id">
                                    @foreach ($securities as $security)
                                        <option value="{{ $security->id }}">{{ $security->linguistic_value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
