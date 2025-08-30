<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'dob'  => 'required|date',
        ]);

        // Nama biar tidak case sensitive
        $name = strtolower($request->input('name'));
        $dob  = $request->input('dob');

        if ($name === 'ella' && $dob === '2008-05-14') {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil! Halo Ella 🎉'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Nama atau tanggal lahir salah.'
        ]);
    }
}
