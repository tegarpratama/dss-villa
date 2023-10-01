<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function post(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (!auth()->attempt($credentials)) {
            return back()->with('message', 'Wrong username or password');
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
