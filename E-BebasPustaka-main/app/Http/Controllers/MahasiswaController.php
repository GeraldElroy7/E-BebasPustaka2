<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
use Mail;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Ajuan;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function create()
    {
        return view ('mahasiswa/register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nrp' => 'required|numeric',
            'email' => 'required|unique:mahasiswa,email',
            'telp' => 'required|numeric',
            'jenjang' => 'required',
            'fakultas' => 'required',
            'departemen' => 'required',
            'judulTA' => 'required',
            'password' => 'required|confirmed|min:5'
        ]);

        try{
            $mahasiswa = Mahasiswa::create([
                'nrp' => $request->input('nrp'),
                'email' => $request->input('email'),
                'nama' => $request->input('nama'),
                'telp' => $request->input('telp'),
                'jenjang' => $request->input('jenjang'),
                'fakultas' => $request->input('fakultas'),
                'departemen' => $request->input('departemen'),
                'judulTA' => $request->input('judulTA'),
                'password' => Hash::make($request->input('password'))
            ]);

            // $request->session()->flash('successform', 'Form berhasil disubmit');
            Alert::success('Sukses!', 'Akun berhasil dibuat');        
            return redirect('/login');
        }
        catch (\Exception $e){
            return redirect()->back();
        }

    }
}
