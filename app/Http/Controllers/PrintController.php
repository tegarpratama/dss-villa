<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Result;
use App\Rank;
use PDF;

class PrintController extends Controller
{
    // public function printApplicant()
    // {
    //     $applicants = Applicant::with('education', 'experience', 'major')->get();
    //     $pdf = PDF::loadView('pages.villa.print', [
    //         'applicants' => $applicants
    //     ]);

    //     return $pdf->download('data-pelamar.pdf');
    // }

    public function printResult()
    {
        $results = Result::with(['villa'])->get();
        $pdf = PDF::loadView('pages.result.print', [
            'results' => $results
        ]);

        return $pdf->download('data-nilai.pdf');
    }

    public function printRank()
    {
        $ranks = Rank::with('villa')->orderBy('total', 'desc')->get();
        $pdf = PDF::loadView('pages.rank.print', [
            'ranks' => $ranks
        ]);

        return $pdf->download('data-hasil.pdf');
    }
}
