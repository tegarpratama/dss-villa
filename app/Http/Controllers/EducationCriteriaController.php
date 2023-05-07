<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EducationCriteriaRequest;
use App\EducationCriteria;

class EducationCriteriaController extends Controller
{
    public function index()
    {
        $educations = EducationCriteria::all();

        return view('pages.criteria.education.index', [
            'educations' => $educations
        ]);
    }

    public function edit($id)
    {
        $education = EducationCriteria::findOrFail($id);

        return view('pages.criteria.education.edit', [
            'education' => $education
        ]);
    }

    public function update(EducationCriteriaRequest $request, $id)
    {
        $data = [
            'education' => $request->education,
            'score' => $request->score
        ];

        $education = EducationCriteria::findOrFail($id);
        $education->update($data);

        return redirect()->route('pendidikan.index')->with('status', 'Nilai kriteria pendidikan berhasil diperbarui.');
    }
}
