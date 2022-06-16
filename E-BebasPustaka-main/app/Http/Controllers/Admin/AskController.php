<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ask;

class AskController extends Controller
{
    // Data ajuan  baru
    public function newAsk(){
        $data_ask = Ask::where('selesai', '0')->get();

        return view('admin/ask', 
            ['data_ask' => $data_ask,
            'data_type' => 'Baru',
            'user' => $this->getCurrentUser()]
        );  
    }

    // Data ajuan yang sudah selesai
    public function finishedAsk(){
        $data_ask = Ask::where('selesai', '1')->get();

        return view('admin/ask', 
            ['data_ask' => $data_ask,
            'data_type' => 'Selesai',
            'user' => $this->getCurrentUser()]
        );

    }

    // Menandai pertanyaan sebagai "selesai" / terjawab
    public function markAsk(Request $request, $id)
    {
        $ask = Ask::find($id);
        $ask->selesai = 1;
        $ask->id_pustakawan = $this->getCurrentUser()->id;
        $ask->update();
        return redirect('/ask/request')->with('success', 'Pertanyaan ditandai sebagai terjawab');
    }

    private function getCurrentUser(){
        $user = auth()->user();
        return $user;
    }

    //CRUD
    public function index(){
        // $thesis = Thesis::all();
        // dd($thesis);
        // return view('form.ethesis');
        // return view('thesis.show' , ['thesis' => $thesis ]);
    }

    public function create(){
        return view('form.ask');
    } 

    public function store(Request $request){
        $request->validate([
            'nama' => 'required', 
            'no_hp' => 'required|min:11|numeric',
            'status' => 'required',
            'pertanyaan' => 'required',
            'email' => 'required|email',
            ]);

        try{
       
            $ask = Ask::create([
                    'nama' => $request->input('nama'),
                    'no_hp' => $request->input('no_hp'),
                    'status' => $request->input('status'),
                    'pertanyaan' => $request->input('pertanyaan'),
                    'kategori' => $request->input('kategori'),
                    'email' => $request->input('email'),
                ]);

                $r = $request->input('nama');
                $request->session()->flash('successform', 'Form berhasil disubmit');
                return view('form.thankspage')->with('nama', $r);
            }
        catch (\Exception $e){
            $request->session()->flash('gagal', 'Form tidak berhasil disubmit'.$e->getMessage());
            // return redirect()->back();
        }
    }
    // public function thanks(){
    //     $r = Ask::all()->last()->nama;
    //     return view('form.thankspage',['nama'=> $r]);
    // }

}
