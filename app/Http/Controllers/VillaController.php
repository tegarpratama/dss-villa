<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ApplicantRequest;
use App\Villa;
use App\EducationCriteria;
use App\ExperienceCriteria;
use App\InterviewCriteria;
use App\MajorCriteria;
use App\Result;
use PDF;

class VillaController extends Controller
{
    public function index()
    {
        $applicants = Applicant::with('education', 'experience', 'major')->paginate(10);

        return view('pages.applicant.index', [
            'applicants' => $applicants
        ]);
    }

    public function create()
    {
        $educations = EducationCriteria::all();
        $experiences = ExperienceCriteria::all();
        $interviews = InterviewCriteria::all();
        $majors = MajorCriteria::all();

        return view('pages.applicant.create', [
            'educations' => $educations,
            'experiences' => $experiences,
            'interviews' => $interviews,
            'majors' => $majors,
        ]);
    }

    public function store(ApplicantRequest $request)
    {
        $data = $request->all();

        $applicant = Applicant::create($data);

        $this->insertScoreApplicant($applicant);

        return redirect()->route('pelamar.index')->with('status', 'Pelamar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);
        $educations = EducationCriteria::all();
        $experiences = ExperienceCriteria::all();
        $interviews = InterviewCriteria::all();
        $majors = MajorCriteria::all();

        return view('pages.applicant.edit', [
            'applicant' => $applicant,
            'educations' => $educations,
            'experiences' => $experiences,
            'interviews' => $interviews,
            'majors' => $majors,
        ]);
    }

    public function update(ApplicantRequest $request, $id)
    {
        $data = $request->all();

        $applicant = Applicant::findOrFail($id);
        $applicant->update($data);

        $this->insertScoreApplicant($applicant);

        return redirect()->route('pelamar.index')->with('status', 'Pelamar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Applicant::findOrFail($id)->delete();

        return redirect()->route('pelamar.index')->with('status', 'Pelamar berhasil dihapus.');
    }

    public function insertScoreApplicant($applicant)
    {
        $applicant_id = $applicant->id;
        $education_score = EducationCriteria::find($applicant->education_criteria_id)->score;
        $major_score = MajorCriteria::find($applicant->major_criteria_id)->score;
        $experience_score = ExperienceCriteria::find($applicant->experience_criteria_id)->score;
        $interview_score = $this->interviewScore($applicant->interview_score);

        $data = [
            'applicant_id' => $applicant_id,
            'education_score' => $education_score,
            'major_score' => $major_score,
            'experience_score' => $experience_score,
            'interview_score' => $interview_score,
        ];

        // check applicant exists
        $result = Result::where('applicant_id', $applicant_id)->first();

        if($result) {
            $result->update($data);
        }else{
            Result::create($data);
        }

        return;
    }

    public function interviewScore($interview)
    {
        $interviewCriterias = InterviewCriteria::all();
        $interviewScore;

        foreach($interviewCriterias as $ic) {
            if($interview >= $ic->min_param && $interview <= $ic->max_param) {
                $interviewScore = $ic->score;
            }
        }

        return $interviewScore;
    }

    public function printApplicant()
    {
        $applicants = Applicant::with('education', 'experience', 'major')->get();
        $pdf = PDF::loadView('pages.aplicant.print', $applicants);

        return $pdf->download('data-pelamar.pdf');
    }
}
