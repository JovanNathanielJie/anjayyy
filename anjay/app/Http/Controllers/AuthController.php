<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'birthdate' => 'required|date', // sesuai form kamu
        ]);

        $name = strtolower($request->input('name'));
        $dob  = $request->input('birthdate');

        // Cek hardcode user "Ella"
        if ($name === 'ella' && $dob === '2008-05-14') {
            // Simpan session sederhana
            $request->session()->put('user_name', 'Ella');

            // Redirect ke dashboard Spotify Top 3
            return redirect()->route('dashboard.index')
                             ->with('success', 'Login berhasil! Halo Ella 🎉');
        }

        // Jika gagal
        return back()->with('error', 'Nama atau tanggal lahir salah 😢');
    }

    // Logout sederhana
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('success', 'Berhasil logout 👋');
    }
}
