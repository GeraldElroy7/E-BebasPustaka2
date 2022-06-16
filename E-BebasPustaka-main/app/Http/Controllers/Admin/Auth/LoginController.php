<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view ('admin/auth/login');
    }

    public function loginProcess(Request $request){
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]);

            $credential = $request->only('email', 'password');

            if(Auth::attempt($credential)){
                return redirect()->intended('/dashboard');
            }
            return redirect('/admin-login')->with('error', 'Email atau password salah');
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('/admin-login');
    }
}
