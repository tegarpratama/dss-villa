<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HygieneCriteria;

class HygieneCriteriaController extends Controller
{
    public function index()
    {
        $hygiene = HygieneCriteria::all();

        return view('pages.criteria.hygiene.index', [
            'hygiene' => $hygiene
        ]);
    }

    public function edit($id)
    {
        $hygiene = HygieneCriteria::findOrFail($id);

        return view('pages.criteria.hygiene.edit', [
            'hygiene' => $hygiene
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'linguistic_value' => $request->linguistic_value,
            'score' => $request->score
        ];

        $hygiene = HygieneCriteria::findOrFail($id);
        $hygiene->update($data);

        return redirect()->route('kebersihan.index')->with('status', 'Nilai kriteria kebersihan berhasil diperbarui.');
    }
}
