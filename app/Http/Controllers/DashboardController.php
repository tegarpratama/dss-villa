<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $applicants = Applicant::count();
        $admins = User::count();

        return view('pages.dashboard.index', [
            'applicants' => $applicants,
            'admins' => $admins
        ]);
    }
}
