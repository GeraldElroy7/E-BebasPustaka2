<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        // info
        $data_user = User::all();

        return view('admin/admin-list', 
            ['data_user' => $data_user,
            'user' => $this->getCurrentUser()]
        );
    }

    public function create(Request $request)
    {
        $rules = [
			'name' => 'required|string|min:3|max:255',
			'email' => 'required|string|email|max:255|unique:users|confirmed',
            'password' => 'required|string|min:5|confirmed',
		];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
			return redirect('/admin-list')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'level' => 'pustakawan',
            ]);
            return redirect('/admin-list')->with('success', 'Pustakawan sudah ditambahkan');
		}

    }

    public function getProfile(){
        return view('admin/profile', 
            ['user' => $this->getCurrentUser()]
        );
    }

    public function changePasswordProfile(Request $request){
        $user = $this->getCurrentUser();
        Validator::extend('checkHashedPass', function($attribute, $value, $parameters){
            return(Hash::check($value, $parameters[0]));
        }, 'Wrong Password');

        $rules = [
			'old_password' =>'required|checkHashedPass:' . $user->password,
            'password' => 'required|string|min:5|confirmed|different:old_password',
		];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
			return redirect('/profile')
			->withInput()
			->withErrors($validator);
		}

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/profile')->with('success', 'Password berhasil diganti');
    }

    private function getCurrentUser(){
        $user = auth()->user();
        return $user;
    }

}
