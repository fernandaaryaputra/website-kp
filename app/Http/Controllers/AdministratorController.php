<?php

namespace App\Http\Controllers;

use App\Models\Akte;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index(){
        return view('administrator.dashboard');
     }
     public function store(Request $request)
    {
        
        if($request->isMethod('post')){
            $tamu = new Akte();
            $tamu->nik = $request->nik;
            $tamu->nama = $request->nama;
            $tamu->tanggallahir = $request->tanggallahir;
            $tamu->ayah = $request->ayah;
            $tamu->ibu = $request->ibu;
            $tamu->alamat = $request->alamat;
            $tamu->save();
            return redirect('/administrator/form-akte')->with(['success' => 'Data Berhasil Terkirim']);
        }
        return view('administrator.form-akte');
    }

    public function downloadfile(){
        $file = public_path('document/depan.pdf');
        return response()->download($file);
    }
}
