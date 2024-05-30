<?php

namespace App\Http\Controllers;

use App\Models\Akte;
use App\Models\AkteKematian;
use App\Models\Ktp;
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
         $data = array(
            'aktes' => AkteKematian::all()
        );
        if($request->isMethod('post')){

            $request->validate([
                'pdf' => 'required|file|mimes:pdf|max:2040'
            ]);

            $pdfFile = $request->file('pdf');
            $originalFileName = $pdfFile->getClientOriginalName(); // Get original file name
            $pdfFilePath = $pdfFile->storeAs('public/document', $pdfFile->hashName());

            $tamu = new AkteKematian();
            $tamu->nik = $request->nik;
            $tamu->nama = $request->nama;
            $tamu->alamat = $request->alamat;
            $tamu->pdf = $pdfFilePath; // Save the file path in the database
            $tamu->original_filename = $originalFileName; // Save the original file name in the database
            $tamu->tanggallahir = $request->tanggallahir;
            $tamu->save();
            return redirect('/administrator/form-akte-kematian')->with(['success' => 'Data Berhasil Terkirim']);
        }
        return view('administrator.form-akte-kematian',$data);
    }
    public function dataktp(Request $request){
        if($request->isMethod('post')){

            $request->validate([
                'foto' => 'required|file|mimes:png,jpg,jpeg|max:2040',
                'dokumen' => 'required|file|mimes:pdf|max:2040'
            ]);

            $dokumen = $request->file('dokumen');
            $dokumenPath = $dokumen->storeAs('public/ktp', $dokumen->getClientOriginalName());
            $foto = $request->file('foto');
            $fotoPath = $foto->storeAs('public/ktp', $foto->getClientOriginalExtension());

            $ktp = new Ktp();
            $ktp->nik = $request->nik;
            $ktp->nama = $request->nama;
            $ktp->tanggallahir = $request->tanggallahir;
            $ktp->jeniskelamin = $request->jeniskelamin;
            $ktp->alamat = $request->alamat;
            $ktp->statusperkawinan = $request->statusperkawinan;
            $ktp->exp = $request->exp;
            $ktp->agama = $request->agama;
            $ktp->foto = $fotoPath; // Save the file path in the database
            $ktp->dokumen = $dokumenPath; // Save the file path in the database
            $ktp->save();
            return redirect('/administrator/form-akte-kematian')->with(['success' => 'Data Berhasil Terkirim']);
        }
        return view('administrator.form-ktp');
    }

    public function downloadfile(){
        $file = public_path('document/depan.pdf');
        return response()->download($file);
    }
    public function downloadaktekematian(Request $request, string $id){
        // $download = AkteKematian::find($id);
        // $data = array(
        //     'kematian' => $download->pdf
        // );
        // $file = $request->pdf;
        // return response()->download($data);

            $download = AkteKematian::find($id);
    if (!$download) {
        return redirect('/administrator/form-akte-kematian')->with(['error' => 'File not found']);
    }

    $filePath = storage_path('app/' . $download->pdf);
    // return response()->download($filePath);
    $originalFileName = $download->original_filename;
    return response()->download($filePath, $originalFileName);
    }
}
