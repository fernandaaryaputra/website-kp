@extends('tamplate')
@section('title', ' | Menu')
@section('content')
    <h1 class="text-3xl text-black pb-6">Menu Dukcapil</h1>
                    
    <div class="flex flex-wrap gap-20 px-5 mx-auto">

        <a href="{{ url('/administrator/menu-akte') }}" class="bg-red-700 w-96 h-40 relative rounded-xl group  hover:bg-blue-700 transition ease-in-out">
            <img src="{{ asset('img/bayi.png') }}" alt="" class="w-24 h-20 ">
            <h1 class="mt-5 font-bold text-2xl text-right mr-5 mb-5 text-white group-hover:text-green-400">Akta Kelahiran</h1>
        </a>
        <a href="{{ url('/administrator/menu-akte-kematian') }}" class="bg-black w-96 h-40 relative rounded-xl group hover:bg-red-700">
            <img src="{{ asset('img/RIP.png') }}" alt="" class="w-20 h-16 mt-2 ml-5">
            <h1 class="mt-8 font-bold text-2xl text-right mr-5 mb-5 text-white group-hover:text-blue-600">Akta Kematian</h1>
        </a>
        <a href="#" class="bg-blue-600 w-96 h-40 relative rounded-xl">
            <img src="{{ asset('img/family.png') }}" alt="" class="w-24 h-24">
            <h1 class="mt-5 font-bold text-2xl text-right mr-5 mb-5 text-white">Kartu Keluarga</h1>
        </a>
        <a href="#" class="bg-red-700 w-96 h-40 relative rounded-xl">
            <img src="{{ asset('img/bayi.png') }}" alt="" class="w-24 h-20">
            <h1 class="mt-5 font-bold text-2xl text-right mr-5 mb-5 text-white">Akta Kartu Identitas Anak</h1>
        </a>
        <a href="#" class="bg-red-700 w-96 h-40 relative rounded-xl">
            <img src="{{ asset('img/bayi.png') }}" alt="" class="w-24 h-20">
            <h1 class="mt-5 font-bold text-2xl text-right mr-5 mb-5 text-white">Akta Kelahiran</h1>
        </a>
        <a href="#" class="bg-red-700 w-96 h-40 relative rounded-xl">
            <img src="{{ asset('img/bayi.png') }}" alt="" class="w-24 h-20">
            <h1 class="mt-5 font-bold text-2xl text-right mr-5 mb-5 text-white">Akta Kelahiran</h1>
        </a>
    </div>
@endsection
