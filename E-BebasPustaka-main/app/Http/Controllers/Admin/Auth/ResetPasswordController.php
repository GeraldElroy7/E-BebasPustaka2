<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function getPassword($token) {
        return view('admin/auth/reset', ['token' => $token]);
    }
 
    public function updatePassword(Request $request)
    {
        $rules = [
			'email' => 'required|email|exists:users',
            'password' => 'required|string|min:5|confirmed',
		];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
			return back()->withInput()->withErrors($validator);
		}
		else{
            $updatePassword = DB::table('password_resets')
                                ->where(['email' => $request->email, 'token' => $request->token])
                                ->first();
            
            if(!$updatePassword)
                return back()->withInput()->with('error', 'Invalid token!');

            $user = User::where('email', $request->email)
                        ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email'=> $request->email])->delete();

            return redirect('/admin-login')->with('success', 'Password berhasil diubah!');
        }
    }
}
