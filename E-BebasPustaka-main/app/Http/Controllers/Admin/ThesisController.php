<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thesis;
use Illuminate\Support\Facades\Storage;


class ThesisController extends Controller
{
    public function __construct(){
        $this->Thesis = new Thesis();
    }

     // Data permintaan E-Thesis baru
     public function newThesis(){
        $data_thesis = Thesis::where('selesai', '0')->get();

        return view('admin/thesis', 
            ['data_thesis' => $data_thesis,
            'data_type' => 'Baru',
            'user' => $this->getCurrentUser()]
        );
        
    }

    // Data permintaan E-thesis yang sudah selesai
    public function finishedThesis(){
        $data_thesis = Thesis::where('selesai', '1')->get();

        return view('admin/thesis', 
            ['data_thesis' => $data_thesis,
            'data_type' => 'Selesai',
            'user' => $this->getCurrentUser()]
        );

    }

    public function markThesis(Request $request, $id)
    {
        $thesis = Thesis::find($id);
        $thesis->selesai = 1;
        $thesis->id_pustakawan = $this->getCurrentUser()->id;
        $thesis->update();
        return redirect('/thesis/request')->with('success', 'Permintaan telah diselesaikan');
    }

    // grafik thesis
    public function graphThesis(){
        $data_thesis = Thesis::groupBy('kategori')->selectRaw('count(*) as total, kategori')->get();
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
        return view('form.ethesis');
    } 

    public function store(Request $request){
        $request->validate([
            'nama' => 'required', 
            // 'nid' => 'required|min:6',
            'status' => 'required',
            'institusi' => 'required|min:3',
            'email' => 'required|email',
            'no_hp' => 'required|min:11|numeric',
            'kategori' => 'required',
            'judul' => 'required|',
            'pengarang' => 'required|',
            'tahun' => 'required|numeric|min:4',
            'link' => 'required|url',
            'ktp' => 'required|file|mimes:jpg,jpeg,bmp,png,pdf|max:7000', // max 7MB
        ]);

        try{
            $file = $request->file('ktp');
            $newImageName = time() . '-' . $file->getClientOriginalName();
            $path = Storage::putFileAs('public/fotoktp',$file,$newImageName);
            $size = $file->getSize();


            $thesis = Thesis::create([
                'nama' => $request->input('nama'),
                'status' => $request->input('status'),
                'institusi' => $request->input('institusi'),
                'email' => $request->input('email'),
                'no_hp' => $request->input('no_hp'),
                'kategori' => $request->input('kategori'),
                'judul' => $request->input('judul'),
                'pengarang' => $request->input('pengarang'),
                'tahun' => $request->input('tahun'),
                'link' => $request->input('link'),
                'keterangan' => $request->input('keterangan'),
                'ktp' => Storage::url($path),
                'size' => $size,
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

    public function download($id){
        try{
            $download = Thesis::find($id);
            $filepath = public_path() . $download->ktp;  
            return response()->download($filepath);            
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    // public function delete(){
    //     try{
    //         Storage::disk('local')->delete('');
    //         return 'deleted';
    //     }
    //     catch(\Exception $e){
    //         return $e->getMessage();
    //     }
    // }


    public function show(){
    }
    public function edit(){
    }
    public function update(){
    }
    public function destroy(){
    }
    
}
