<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Ajuan;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaAuthController extends Controller
{
    public function login()
    {
        // \dd(Auth::guard('mahasiswa')->check());
        return view ('mahasiswa/login');        
    }

    public function handleLogin(Request $request)
    {
        // \dd($request->all());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/form');
        }

        Alert::error('Gagal', 'Akun dengan kombinasi email & password tersebut tidak ditemukan');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
