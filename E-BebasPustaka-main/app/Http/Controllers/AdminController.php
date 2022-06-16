<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Validator;
use Auth;
use Hash;
use Mail;
use App\Models\Mahasiswa;
use App\Models\Admin;
use App\Models\Ajuan;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
  public function index()
  {
      $admin =  Auth::guard('admin')->user();
      $mahasiswa = Mahasiswa::all();
      
      return view ('admin.index', compact(['admin', 'mahasiswa']));
  }    

  public function detail($id)
  {
      $mahasiswa = Mahasiswa::find($id);

      return response()->json($mahasiswa);
  }

  public function aktivasiMahasiswa(Request $request, $id){
    try {
        DB::transaction(function() use ($request, $id) {
            $mhs = Mahasiswa::find($id);
            // dd($mhs);
            $mhs->status = 1;
            $mhs->update();
        });

        // Mahasiswa::where('id', $id)
        //   ->update(['status' => 1]);
        Alert::success('Sukses', 'Mahasiswa berhasil diverifikasi');
        return redirect()->back();
    } catch(Exception $e) {
        Alert::success('Gagal', 'Mahasiswa gagal diverifikasi'.$e->getMessage());
        return redirect()->back();
    }
  }

  public function validasiSetuju(Request $request, $id)
  {
    try {
        DB::transaction(function() use ($request, $id) {
            $mhs = Mahasiswa::find($id);
            $mhs->status = 2;
            $mhs->update();
        });
        Alert::success('Sukses', 'Mahasiswa berhasil disetujui');
        return redirect()->back();
    } catch(Exception $e) {
        Alert::success('Gagal', 'Mahasiswa gagal disetujui'.$e->getMessage());
        return redirect()->back();
    }
  } 

  public function validasiTolak(Request $request, $id)
  {
    try {
        DB::transaction(function() use ($request, $id) {
            $mhs = Mahasiswa::find($id);
            $mhs->status = 0;
            $mhs->update();
        });
        Alert::success('Sukses', 'Mahasiswa berhasil ditolak');
        return redirect()->back();
    } catch(Exception $e) {
        Alert::success('Gagal', 'Mahasiswa gagal ditolak'.$e->getMessage());
        return redirect()->back();
    }
  } 

  public function validasi()
  {
      $admin =  Auth::guard('admin')->user();
      $mahasiswa = Mahasiswa::all();
      
      return view ('admin.validasi', compact(['admin', 'mahasiswa']));
  } 

  public function terimaTA()
  {
      $admin =  Auth::guard('admin')->user();
      $mahasiswa = Mahasiswa::all();
      
      return view ('admin.terimaTA', compact(['admin', 'mahasiswa']));
  } 

  public function terimaTASetuju(Request $request, $id)
  {
    try {
        DB::transaction(function() use ($request, $id) {
            $mhs = Mahasiswa::find($id);
            $mhs->status = 3;
            $mhs->update();
        });
        Alert::success('Sukses', 'Mahasiswa berhasil disetujui');
        return redirect()->back();
    } catch(Exception $e) {
        Alert::success('Gagal', 'Mahasiswa gagal disetujui'.$e->getMessage());
        return redirect()->back();
    }
  } 

  public function tanggungan()
  {
      $admin =  Auth::guard('admin')->user();
      $mahasiswa = Mahasiswa::all();
      
      return view ('admin.tanggungan', compact(['admin', 'mahasiswa']));
  } 

  public function suratbebas()
  {
      $admin =  Auth::guard('admin')->user();
      $mahasiswa = Mahasiswa::all();
      
      return view ('admin.suratbebas', compact(['admin', 'mahasiswa']));
  } 

  public function suratbebasSetuju(Request $request, $id)
  {
    try {
        DB::transaction(function() use ($request, $id) {
            $mhs = Mahasiswa::find($id);
            $mhs->status = 4;
            $mhs->update();
        });
        Alert::success('Sukses', 'Mahasiswa berhasil disetujui');
        return redirect()->back();
    } catch(Exception $e) {
        Alert::success('Gagal', 'Mahasiswa gagal disetujui'.$e->getMessage());
        return redirect()->back();
    }
  }
}
