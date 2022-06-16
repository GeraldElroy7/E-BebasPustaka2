<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Mail;

class ForgotPasswordController extends Controller
{
    public function getEmail(){
        return view('admin/auth/email');
    }

    public function postEmail(Request $request){
        $rules = [
			'email' => 'required|email|exists:users',
		];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
			return redirect('/forgot-password')->with('error', 'Email belum terdaftar');
		}
		else{
            $token = Str::random(60);

            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );

            Mail::send('admin/auth/verify',['token' => $token], function($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('Atur ulang kata sandi');
                });

            return back()->with('success', 'Email verifikasi telah dikirim');
        }
    }
}
