@extends('tamplate')
@section('title', ' | Tambah Akte Kematian')
@section('content')
    <h1 class="text-3xl text-black pb-6 font-semibold">Form Tambah Akte Kematian</h1>

    <div class="flex flex-wrap gap-20 px-5 mx-auto bg-[#C1C0C0] rounded-md shadow-md shadow-slate-700">
    <form method="POST" class="grid md:grid-cols-2 w-full gap-10  auto-rows-max grid-cols-1 pt-7" enctype="multipart/form-data" action="">
        @csrf
        <div class="col-span-2 md:col-span-1">
        <label for="" class="text-2xl">NIK</label>
        <br>
        <input type="text" name="nik" placeholder="nik" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg">
        </div>
        <div class="col-span-2 md:col-span-1">
        <label for="" class="text-2xl">Nama Lengkap</label>
        <br>
        <input type="text" name="nama" placeholder="nama lengkap"  class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg">
    </div>
    <div class="col-span-2">
        <label for="" class="text-2xl">Alamat</label>
        <input type="text" name="alamat" placeholder="alamat" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg">
    </div>
    <div class="col-span-2">
        <label for="" class="text-2xl">Upload File</label>
        <input type="file" class="bg-white p-2 form-control w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" id="pdf" name="pdf" accept="application/pdf" required>
    </div>
        <div class="col-span-2">
            <label for="" class="text-2xl">Tanggal Lahir</label>
            
            <input type="datetime-local" name="tanggallahir" id="tanggallahir" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg">
        </div>

        <div class="flex justify-center w-full  col-span-2 pb-10 pt-5">
            <button type="submit" class="px-40 py-2 bg-green-500 rounded-lg shadow-lg font-bold hover:bg-green-950 hover:text-white">Submit</button>
        </div>   
    </form>
    </div>
@endsection