@extends('tamplate')
@section('title', '| Menu Akte Kelahiran')
@section('content')
<h1 class="text-3xl text-black pb-6 font-semibold">Data List Akte</h1>

<div class="pb-4 space-x-1 flex justify-between col-span-2 md:col-span-1">
        <div class="text-black">
            <form action="{{ url('/administrator/cari-akte') }}" method="GET">
                <input type="text" name="cari" id="cari" placeholder="Cari ..." class="rounded-sm px-3 py-1 w-96 bg-[#C1C0C0]">
                <button class="bg-gray-800 text-white ml-3 px-3 py-1 rounded-sm">Cari</button>
            </form>
        </div>

        <a href="{{ url('/administrator/form-akte') }}" class="bg-green-700 rounded-sm text-white px-3 py-1 hover:bg-green-900">Tambah Data</a>
</div>

<table border="1" class="w-full bg-[#C1C0C0] rounded-md shadow-md shadow-slate-700 mb-20 text-center">
    <thead class="bg-slate-600 text-white border border-white font-semibold">
        <tr class="border border-white border-b-white text-lg">
            <td class="border border-white border-b-white">NO</td>
            <td class="border border-white border-b-white">KK</td>
            <td class="border border-white border-b-white">NIK</td>
            <td class="border border-white border-b-white">NAMA LENGKAP</td>   
            <td class="border border-white border-b-white">ALAMAT</td>   
            <td class="border border-white border-b-white">AKSI</td>
        </tr>    
    </thead>
    <tbody class=" border border-white text-black text-base">
        @foreach ($akte as $data)
        <tr class="border border-white border-b-white">
            <td class="border border-white border-b-white px-3 py-3">{{ $data->id }}.</td>
            <td class="border border-white border-b-white px-3 py-3">{{ $data->kk }}</td>
            <td class="border border-white border-b-white">{{ $data->nik }}</td>
            <td class="border border-white border-b-white">{{ $data->nama }}</td>
            <td class="border border-white border-b-white">{{ $data->alamat }}</td>
            <td class="border border-white border-b-white space-x-1">
                <a href="" class="bg-blue-700 rounded-sm text-white px-3 py-1 hover:bg-blue-900">Lihat</a>
                <a href="{{ url('/administrator/menu-akte/edit/'.$data->id) }}" class="bg-yellow-700 rounded-sm text-white px-3 py-1 hover:bg-yellow-900">Edit</a>
                <a href="{{url('/administrator/menu-akte/delete/'.$data->id)}}" class="bg-red-700 rounded-sm text-white px-3 py-1 hover:bg-red-900">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection