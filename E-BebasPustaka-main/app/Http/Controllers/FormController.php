<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function create(){
        return view('welcome');
    } 
    public function store(Request $request){
        dd($request);
        $request->validate([
            'nrp' => 'required', 
            'email' => 'required|email',
            'nama' => 'required', 
            'telp' => 'required|min:11|numeric',
            'jenjang' => 'required',
            'fakultas' => 'required',
            'departemen' => 'required',
            'judulTA' => 'required',
        ]);

        try{
            $mahasiswa = Mahasiswa::create([
                'nrp' => $request->input('nrp'),
                'email' => $request->input('email'),
                'nama' => $request->input('nama'),
                'telp' => $request->input('telp'),
                'jenjang' => $request->input('flexRadioJenjang'),
                'fakultas' => $request->input('flexRadioFakultas'),
                'departemen' => $request->input('departemen'),
                'judulTA' => $request->input('judulTA'),
            ]);
            $r = $request->input('nama');
            $request->session()->flash('successform', 'Form berhasil disubmit');
            return view('form.thankspage')->with('nama', $r);
       }
        catch (\Exception $e){
            $request->session()->flash('gagal', 'Form tidak berhasil disubmit'.$e->getMessage());
            return redirect()->back();
        }
    }
}
