<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcceptanceCriteria;

class AcceptanceCriteriaController extends Controller
{
    public function index()
    {
        $acceptances = AcceptanceCriteria::all();

        return view('pages.criteria.acceptance.index', [
            'acceptances' => $acceptances
        ]);
    }

    public function edit($id)
    {
        $acceptance = AcceptanceCriteria::findOrFail($id);

        return view('pages.criteria.acceptance.edit', [
            'acceptance' => $acceptance
        ]);
    }

    public function update(Request $request, $id)
    {
        $data['score'] = $request->score;

        $acceptance = AcceptanceCriteria::findOrFail($id);
        $acceptance->update($data);

        return redirect()->route('penerimaan.index')->with('status', 'Nilai kriteria berhasil diperbarui.');
    }
}
