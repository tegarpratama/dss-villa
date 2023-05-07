<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationCriteria;

class LocationCriteriaController extends Controller
{
    public function index()
    {
        $location = LocationCriteria::all();

        return view('pages.criteria.location.index', [
            'location' => $location
        ]);
    }

    public function edit($id)
    {
        $location = LocationCriteria::findOrFail($id);

        return view('pages.criteria.location.edit', [
            'location' => $location
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'linguistic_value' => $request->linguistic_value,
            'score' => $request->score
        ];

        $location = LocationCriteria::findOrFail($id);
        $location->update($data);

        return redirect()->route('lokasi.index')->with('status', 'Nilai kriteria lokasi berhasil diperbarui.');
    }
}
