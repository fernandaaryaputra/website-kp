<?php

namespace App\Http\Controllers;

use App\Models\Akte;
use App\Models\AkteKematian;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index(){
        return view('administrator.dashboard');
     }

    //  fungsi untuk class Akte
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

    public function akte_kematian(Request $request) {
        if($request->isMethod('post')){

            $request->validate([
                'pdf' => 'required|file|mimes:pdf|max:2040'
            ]);

            $pdfFile = $request->file('pdf');
            $pdfFilePath = $pdfFile->storeAs('public/document', $pdfFile->hashName());

            $tamuNew = new AkteKematian();
            $tamuNew->nik = $request->nik;
            $tamuNew->nama = $request->nama;
            $tamuNew->alamat = $request->alamat;
            $tamuNew->pdf = $pdfFilePath; // Save the file path in the database
            $tamuNew->tanggallahir = $request->tanggallahir;
            $tamuNew->save();
            return redirect('/administrator/form-akte-kematian')->with(['success' => 'Data Berhasil Terkirim']);
        }
        return view('administrator.form-akte-kematian');
    }

    public function downloadfile(){
        $file = public_path('document/depan.pdf');
        return response()->download($file);
    }
}
