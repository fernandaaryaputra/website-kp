@extends('tamplate')
@section('title', 'Edit Akte Kelahiran')
@section('content')
    <h1 class="text-3xl text-black pb-6 font-semibold">Edit Akte Kelahiran</h1>
    <div class="flex flex-wrap gap-20 px-5 mx-auto bg-[#C1C0C0] rounded-md shadow-md shadow-slate-700">

    <form method="POST" class="grid md:grid-cols-2 w-full gap-10  auto-rows-max grid-cols-1 pt-7" action="{{ url('/administrator/update-akte/' . $akte->id) }}">
        @method('put')
        @csrf
        <div class="col-span-2 md:col-span-1">
            <label for="" class="text-2xl">No KK</label>
            <br>
            <input type="text" name="kk" placeholder="no kk" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" value="{{ $akte->kk }}">
            </div>
        <div class="col-span-2 md:col-span-1">
        <label for="" class="text-2xl">No NIK</label>
        <br>
        <input type="text" name="nik" placeholder="no nik" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" value="{{ $akte->nik }}">
        </div>
        <div class="col-span-2 md:col-span-1">
        <label for="" class="text-2xl">Nama Lengkap</label>
        <br>
        <input type="text" name="nama" placeholder="nama lengkap"  class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" value="{{ $akte->nama }}">
        </div>
        <div class="col-span-2 md:col-span-1">
        <label for="" class="text-2xl">Nama Ayah</label>
        <input type="text" name="ayah" placeholder="nama ayah" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" value="{{ $akte->ayah }}">
        </div>
        <div class="col-span-2 md:col-span-1">
        <label for="" class="text-2xl"> Nama Ibu</label>
        <br>
        <input type="text" name="ibu" placeholder="nama ibu" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" value="{{ $akte->ibu }}">
        </div>
        <div class="col-span-2 md:col-span-1">
        <label for="" class="text-2xl">Alamat</label>
        <input type="text" name="alamat" placeholder="alamat" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" value="{{ $akte->alamat }}">
        </div>
        <div class="col-span-2">
        <label for="" class="text-2xl">Tanggal Lahir</label>
        
        <input type="datetime-local" name="tanggallahir" id="tanggallahir" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg" value="{{ $akte->tanggallahir }}">
        </div>
        
        <div class="flex justify-center w-full  col-span-2 pb-10 pt-5">
            <button type="submit" class="px-40 py-2 bg-green-500 rounded-lg shadow-lg font-bold hover:bg-green-950 text-black hover:text-white">Submit</button>
        </div>   
    </form>
    </div>

    <div class="h-1 w-full bg-black mt-10"></div>
    <h1 class="text-4xl text-center ">Dokumen Pendukung </h1>
    <p class="text-2xl">1.Akta kelahiran:</p>
    <a href="{{ url('administrator/form-akte/download') }}" download="filename.pdf" class="bg-green-700 text-xl ml-5 mb-10 "><button class="bg-yellow-400 px-5 py-2 flex text-4xl" type="button"><span>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10"><path d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13 12V8H11V12H8L12 16L16 12H13Z" ></path></svg></span> download</button></a>
@endsection
