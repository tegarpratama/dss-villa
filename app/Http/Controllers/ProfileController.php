<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.index');
    }

    public function update(ProfileRequest $request, $id)
    {
        $data = [
            'password' => Hash::make($request->password)
        ];

        $profile = User::findOrFail($id);
        $profile->update($data);

        return redirect()->route('admin.index')->with('status', 'Password berhasil diperbarui.');
    }
}
