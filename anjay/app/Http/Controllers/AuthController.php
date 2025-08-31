<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'birthdate'  => 'required|date',
        ]);

        $name = strtolower($request->input('name'));
        $dob  = $request->input('birthdate');

        if ($name === 'ella' && $dob === '2008-05-14') {
            session([
            'user_name' => 'Ella',
            'user_birthdate' => $dob,
            ]);
            return redirect()->route('dashboard.index');
        }

        return back()->with('error', 'Nama atau tanggal lahir salah.');
    }
}
