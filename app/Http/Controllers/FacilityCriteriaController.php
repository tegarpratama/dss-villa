<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityCriteria;

class FacilityCriteriaController extends Controller
{
    public function index()
    {
        $facility = FacilityCriteria::all();

        return view('pages.criteria.facility.index', [
            'facility' => $facility
        ]);
    }

    public function edit($id)
    {
        $facility = FacilityCriteria::findOrFail($id);

        return view('pages.criteria.facility.edit', [
            'facility' => $facility
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'linguistic_value' => $request->linguistic_value,
            'score' => $request->score
        ];

        $facility = FacilityCriteria::findOrFail($id);
        $facility->update($data);

        return redirect()->route('fasilitas.index')->with('status', 'Nilai kriteria fasilitas berhasil diperbarui.');
    }
}
