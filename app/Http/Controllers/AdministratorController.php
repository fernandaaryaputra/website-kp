<?php

namespace App\Http\Controllers;

use App\Models\Akte;
use App\Models\AkteKematian;
use App\Models\Ktp;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class AdministratorController extends Controller
{
    public function index(){
        return view('administrator.dashboard');
     }

    //AKTE
    public function akte() {
        $data = array(
            'akte' => Akte::all()
        );
        return view('administrator.menu-akte',$data);
    }

    //  fungsi untuk class Aktex
     public function store(Request $request) 
    {

        $data = array(
            'akte' => Akte::all()
        );
 
        if($request->isMethod('post')){
            $tamu = new Akte();
            $tamu->nik = $request->nik;
            $tamu->nama = $request->nama;
            $tamu->kk = $request->kk;
            $tamu->tanggallahir = $request->tanggallahir;
            $tamu->ayah = $request->ayah;
            $tamu->ibu = $request->ibu;
            $tamu->alamat = $request->alamat;
            $tamu->save();
            return redirect('/administrator/menu-akte')->with(['success' => 'Data Telah Ditambahkan']);
        }
        return view('administrator.form-akte', $data);
    }
    public function cari_akte(Request $request){
        $akte = Akte::where('nik', 'LIKE', '%'.$request->cari. '%')->orwhere('kk', 'LIKE', '%'.$request->cari. '%')->paginate(5);
    
        return view('administrator.menu-akte', compact('akte'));
    }
    public function edit_akte($id) {
        $akte = Akte::findOrFail($id);
        return view('administrator.edit-akte', compact('akte'));
    }
    public function update_akte(Request $request, $id) {
        $akte = Akte::findOrFail($id);
        $akte->nik = $request->nik;
        $akte->nama = $request->nama;
        $akte->kk = $request->kk;
        $akte->tanggallahir = $request->tanggallahir;
        $akte->ayah = $request->ayah;
        $akte->ibu = $request->ibu;
        $akte->alamat = $request->alamat;
        $akte->save();
        return redirect('/administrator/menu-akte')->with(['success' => 'Data Telah Diedit']);
    }
    public function hapus_akte(Request $request, string $id){
        $akte = Akte::find($request->id);
        $akte->delete();
        return redirect('/administrator/menu-akte')->with(['delete' => 'Data Telah Dihapus']);
    }
    
    // AKTE KEMATIAN
    public function akte_kematian(Request $request) {
        $data = array(
           'akte_kematians' => AkteKematian::all()
       );

    //    if($request->isMethod('post')){

    //        $request->validate([
    //            'pdf' => 'required|file|mimes:pdf|max:2040'
    //        ]);

    //        $pdfFile = $request->file('pdf');
    //        $originalFileName = $pdfFile->getClientOriginalName(); // Get original file name
    //        $pdfFilePath = $pdfFile->storeAs('public/document', $pdfFile->hashName());

    //        $tamu = new AkteKematian();
    //        $tamu->nik = $request->nik;
    //        $tamu->nama = $request->nama;
    //        $tamu->alamat = $request->alamat;
    //        $tamu->pdf = $pdfFilePath; // Save the file path in the database
    //        $tamu->original_filename = $originalFileName; // Save the original file name in the database
    //        $tamu->tanggallahir = $request->tanggallahir;
    //        $tamu->save();
    //        return redirect('/administrator/menu-akte-kematian')->with(['success' => 'Data Berhasil Terkirim']);
    //    }

       return view('administrator.menu-akte-kematian',$data);
   }
   public function cari_akte_kematian(Request $request){
    $akte_kematians = AkteKematian::where('nik', 'LIKE', '%'.$request->cari. '%')->paginate(5);

    return view('administrator.menu-akte-kematian', compact('akte_kematians'));
}
    public function tambah_akte_kematian(Request $request) {
         $data = array(
            'akte_kematians' => AkteKematian::all()
        );
        if($request->isMethod('post')){
            $request->validate([
                'pdf' => 'required|file|mimes:pdf|max:2040'
                // 'nik' => 'required|exists:akte,nik',
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
            return redirect('/administrator/menu-akte-kematian')->with(['success' => 'Data Telah Ditambahkan']);
        } 
        return view('administrator.form-akte-kematian',$data);
    }
    // public function edit_akte_kematian($nik){
    //     $aktekematian = AkteKematian::find($nik);
    //     return view('administrator.edit-akte-kematian', compact(['aktekematian']));
    // }

    // public function update_akte_kematian(Request $request, $nik){

    // }

    public function edit_akte_kematian($id) {
        $aktekematian = AkteKematian::findOrFail($id);
        return view('administrator.edit-akte-kematian', compact('aktekematian'));
    }
    
    public function update_akte_kematian(Request $request, $id) {
        $request->validate([
            'pdf' => 'nullable|file|mimes:pdf|max:2040'
        ]);
    
        $aktekematian = AkteKematian::findOrFail($id);
        $aktekematian->nik = $request->nik;
        $aktekematian->nama = $request->nama;
        $aktekematian->alamat = $request->alamat;
    
        if ($request->hasFile('pdf')) {
            $pdfFile = $request->file('pdf');
            $originalFileName = $pdfFile->getClientOriginalName();
            $pdfFilePath = $pdfFile->storeAs('public/document', $pdfFile->hashName());
            $aktekematian->pdf = $pdfFilePath;
            $aktekematian->original_filename = $originalFileName;
        }
    
        $aktekematian->tanggallahir = $request->tanggallahir;
        $aktekematian->save();
        return redirect('/administrator/menu-akte-kematian')->with(['success' => 'Data Telah Diedit']);
    }
    public function hapus_akte_kematian(Request $request, string $id){
        $aktekematian = AkteKematian::find($request->id);
        $aktekematian->delete();
        return redirect('/administrator/menu-akte-kematian')->with(['delete' => 'Data Telah Dihapus']);
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

    //         $download = AkteKematian::find($id);
    // if (!$download) {
    //     return redirect('/administrator/form-akte-kematian')->with(['error' => 'File not found']);
    // }

    // $filePath = storage_path('app/' . $download->pdf);
    // // return response()->download($filePath);
    // $originalFileName = $download->original_filename;
    // return response()->download($filePath, $originalFileName);
    $download = AkteKematian::find($id);

    if (!$download) {
        return redirect('/administrator/form-akte-kematian')->with(['error' => 'File not found']);
    }

    $filePath = storage_path('app/' . $download->pdf);
    if (!file_exists($filePath)) {
        return redirect('/administrator/form-akte-kematian')->with(['error' => 'File not found on server']);
    }

    $originalFileName = $download->original_filename;
    return response()->download($filePath, $originalFileName);
    }
}
