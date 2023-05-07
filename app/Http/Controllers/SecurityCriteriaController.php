<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecurityCriteria;

class SecurityCriteriaController extends Controller
{
    public function index()
    {
        $security = SecurityCriteria::all();

        return view('pages.criteria.security.index', [
            'security' => $security
        ]);
    }

    public function edit($id)
    {
        $security = SecurityCriteria::findOrFail($id);

        return view('pages.criteria.security.edit', [
            'security' => $security
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'linguistic_value' => $request->linguistic_value,
            'score' => $request->score
        ];

        $security = SecurityCriteria::findOrFail($id);
        $security->update($data);

        return redirect()->route('keamanan.index')->with('status', 'Nilai kriteria keamanan berhasil diperbarui.');
    }
}
