<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();

        return view('pages.admin.index', [
            'admins' => $admins
        ]);
    }

    public function create()
    {
        return view('pages.admin.create');
    }

    public function store(AdminRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.index')->with('status', 'Admin berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.index')->with('status', 'Admin berhasil dihapus.');
    }
}
