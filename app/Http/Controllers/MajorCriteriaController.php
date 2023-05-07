<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MajorCriteriaRequest;
use App\MajorCriteria;

class MajorCriteriaController extends Controller
{
    public function index()
    {
        $majors = MajorCriteria::all();

        return view('pages.criteria.major.index', [
            'majors' => $majors
        ]);
    }

    public function edit($id)
    {
        $major = MajorCriteria::findOrFail($id);

        return view('pages.criteria.major.edit', [
            'major' => $major
        ]);
    }

    public function update(MajorCriteriaRequest $request, $id)
    {
        $data = [
            'major' => $request->major,
            'score' => $request->score
        ];

        $major = MajorCriteria::findOrFail($id);
        $major->update($data);

        return redirect()->route('jurusan.index')->with('status', 'Nilai kriteria jurusan berhasil diperbarui.');
    }
}
