<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExperienceCriteriaRequest;
use App\ExperienceCriteria;

class ExperienceCriteriaController extends Controller
{
    public function index()
    {
        $experiences = ExperienceCriteria::all();

        return view('pages.criteria.experience.index', [
            'experiences' => $experiences
        ]);
    }

    public function edit($id)
    {
        $experience = ExperienceCriteria::findOrFail($id);

        return view('pages.criteria.experience.edit', [
            'experience' => $experience
        ]);
    }

    public function update(ExperienceCriteriaRequest $request, $id)
    {
        $data = [
            'experience' => $request->experience,
            'score' => $request->score
        ];

        $experience = ExperienceCriteria::findOrFail($id);
        $experience->update($data);

        return redirect()->route('pengalaman.index')->with('status', 'Nilai kriteria pengalaman berhasil diperbarui.');
    }
}
