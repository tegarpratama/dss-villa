<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['applicant'])->paginate(10);

        return view('pages.result.index', [
            'results' => $results
        ]);
    }
}
