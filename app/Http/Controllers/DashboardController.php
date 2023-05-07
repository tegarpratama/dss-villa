<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Villa;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $villas = Villa::count();
        $admins = User::count();

        return view('pages.dashboard.index', [
            'villas' => $villas,
            'admins' => $admins
        ]);
    }
}
