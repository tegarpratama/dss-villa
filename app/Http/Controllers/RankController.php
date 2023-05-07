<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rank;
use App\Result;
use App\AcceptanceCriteria;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Rank::with('applicant')->orderBy('total', 'desc')->paginate(5);

        return view('pages.rank.index', [
            'ranks' => $ranks
        ]);
    }

    public function refresh()
    {
        // delete all data first
        Rank::truncate();

        $results = Result::all();
        $criteria = AcceptanceCriteria::get();
        $maxEducation = 0;
        $maxMajor = 0;
        $maxExperience = 0;
        $maxInterview = 0;

        // get data per column
        foreach($results as $result) {
            $applicants[] = $result->applicant_id;
            $educations[] = $result->education_score;
            $majors[] = $result->major_score;
            $experiences[] = $result->experience_score;
            $interviews[] = $result->interview_score;
        }

        // get max per column
        for($i = 0; $i < count($results); $i++) {
            if ($educations[$i] >= $maxEducation) {
                $maxEducation = $educations[$i];
            }

            if ($majors[$i] >= $maxMajor) {
                $maxMajor = $majors[$i];
            }

            if ($experiences[$i] >= $maxExperience) {
                $maxExperience = $experiences[$i];
            }

            if ($interviews[$i] >= $maxInterview) {
                $maxInterview = $interviews[$i];
            }
        }

        foreach($results as $result) {
            $education_result = (float) number_format(($result->education_score / $maxEducation), 2);
            $major_result = (float) number_format(($result->major_score / $maxMajor), 2);
            $interview_result = (float) number_format(($result->interview_score / $maxInterview), 2);
            $experience_result = (float) number_format(($result->experience_score / $maxExperience), 2);
            $total = (float) number_format(($education_result * $criteria[0]->score) + ($major_result * $criteria[1]->score) + ($interview_result * $criteria[2]->score) + ($experience_result * $criteria[3]->score), 3);

            $data[] = [
                'applicant_id' => $result->applicant_id,
                'education_result' => $education_result,
                'major_result' => $major_result,
                'interview_result' => $interview_result,
                'experience_result' => $experience_result,
                'total' => $total
            ];
        }

        Rank::insert($data);

        return redirect()->route('hasil.index');
    }
}
