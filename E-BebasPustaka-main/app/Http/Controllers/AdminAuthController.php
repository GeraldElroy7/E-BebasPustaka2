<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Ajuan;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin/login');
    }

    public function handleLogin(Request $request)
    {
        // \dd($request->all());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/dashboard');
        }

        Alert::error('Gagal', 'Akun dengan kombinasi email & password tersebut tidak ditemukan');
        return back();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
     
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/admin/login');
    }
}
