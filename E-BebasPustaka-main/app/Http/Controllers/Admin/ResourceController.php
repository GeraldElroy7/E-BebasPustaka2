<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resource;
use Illuminate\Support\Facades\Storage;


class ResourceController extends Controller
{
    public function __construct(){
        $this->Resource = new Resource();
    }

    // Data permintaan E-Resource baru
    public function newResource(){
        $data_resource = Resource::where('selesai', '0')->get();

        return view('admin/resource', 
            ['data_resource' => $data_resource,
            'data_type' => 'Baru',
            'user' => $this->getCurrentUser()]
        );
        
    }

    // Data permintaan E-Resource yang sudah selesai
    public function finishedResource(){
        $data_resource = Resource::where('selesai', '1')->get();

        return view('admin/resource', 
            ['data_resource' => $data_resource,
            'data_type' => 'Selesai',
            'user' => $this->getCurrentUser()]
        );

    }

    // Menandai permintaan sebagai "selesai"
    public function markResource(Request $request, $id)
    {
        $resource = Resource::find($id);
        $resource->selesai = 1;
        $resource->id_pustakawan = $this->getCurrentUser()->id;
        $resource->update();
        return redirect('/resource/request')->with('success', 'Permintaan telah diselesaikan');
    }

    // grafik resource
    public function graphResource(){
        $data_resource = Resource::groupBy('kategori')->selectRaw('count(*) as total, kategori')->get();
    }

    private function getCurrentUser(){
        $user = auth()->user();
        return $user;
    }


    //CRUD
    public function index(){
        // $resource = Resource::all();
        // dd($resource);
        // return view('form.eresource');
        // return view('resource.show' , ['resource' => $resource ]);
    } 
    public function create(){
        return view('form.eresource');
    } 

    public function store(Request $request){
        $request->validate([
            'nama' => 'required', 
            'nid' => 'required|min:6',
            'status' => 'required',
            'institusi' => 'required|min:3',
            'email' => 'required|email',
            'no_hp' => 'required|min:11|numeric',
            'kategori' => 'required',
            'judul' => 'required|',
            'pengarang' => 'required|',
            'tahun' => 'required|numeric|min:4',
            'link' => 'required|url',
            'keterangan'=> 'string|max:255|nullable',
            // 'ktp' => 'required|file|mimes:jpg,jpeg,bmp,png,pdf|max:7000', // max 7MB
        ]);

        try{
            // $file = $request->file('ktp');
            // // $newImageName = time() . '-' . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension(); 
            // $newImageName = time() . '-' . $file->getClientOriginalName();
            // $path = Storage::putFileAs('public/fotoktp',$file,$newImageName);
            // $size = $file->getSize();
    
            $resource = Resource::create([
                'nama' => $request->input('nama'),
                'nid' => $request->input('nid'),
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
                // 'ktp' => Storage::url($path),
                // 'size' => $size,
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

    public function show(){
    }
    public function edit(){
    }
    public function update(){
    }
    public function destroy(){
    }
    

}
