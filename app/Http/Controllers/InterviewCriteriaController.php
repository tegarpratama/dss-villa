<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InterviewCriteriaRequest;
use App\InterviewCriteria;

class InterviewCriteriaController extends Controller
{
    public function index()
    {
        $interviews = InterviewCriteria::all();

        return view('pages.criteria.interview.index', [
            'interviews' => $interviews
        ]);
    }

    public function edit($id)
    {
        $interview = InterviewCriteria::findOrFail($id);

        return view('pages.criteria.interview.edit', [
            'interview' => $interview
        ]);
    }

    public function update(InterviewCriteriaRequest $request, $id)
    {
        $data = [
            'min_param' => $request->min_param,
            'max_param' => $request->max_param,
            'score' => $request->score
        ];

        $interview = InterviewCriteria::findOrFail($id);
        $interview->update($data);

        return redirect()->route('wawancara.index')->with('status', 'Nilai kriteria wawancara berhasil diperbarui.');
    }
}
