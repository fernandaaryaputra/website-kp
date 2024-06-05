<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Akta Kematian | Administrator</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-family-karla flex">
     @if($message = Session::get('success'))
    <script>
        Swal.fire({
            title: "Terima kasih",
            text: "{{ Session::get('success') }}",
            icon: "success"
        });
    </script>
@endif

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Dukcapil Kota Tegal</a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <button type="button" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                Tanggal  
                <span id="tanggalwaktu" class="text-white font-bold ml-2"></span>
            </button>
            <a href="{{ url('/') }}" class="flex items-center  text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <a href="{{ url('/blank') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-sticky-note mr-3"></i>
                Blank Page
            </a>
            <a href="{{ url('/tables') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-table mr-3"></i>
                Tables
            </a>
            <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-align-left mr-3"></i>
                Forms
            </a>
            <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-tablet-alt mr-3"></i>
                Tabbed Content
            </a>
            <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar mr-3"></i>
                Calendar
            </a>
        </nav>
        <!-- <a href="#" class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fas fa-arrow-circle-up mr-3"></i>
            Upgrade to Pro!
        </a> -->
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2 font-semibold text-xl">DUKCAPIL KOTA TEGAL | Administrator</div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
                    <a href="{{ url('/logout') }}" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Dukcapil Kota Tegal</a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav class="flex flex-col pt-4">
                <a href="{{ url('/') }}" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ url('/blank') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Blank Page
                </a>
                <a href="{{ url('/tables') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="{{ url('/form') }}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-cogs mr-3"></i>
                    Support
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-user mr-3"></i>
                    My Account
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Sign Out
                </a>
                <button class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-arrow-circle-up mr-3"></i> Upgrade to Pro!
                </button>
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">6
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
    
        <div class="w-full overflow-x-hidden border-t flex flex-col pb-4">
            <main class="w-full flex-grow p-6">

                {{-- <h1 class="text-3xl text-black pb-6 font-semibold">Data List Akte Kematian</h1>
                <div class="text-end pb-4 space-x-1">
                    <a href="{{ url('/administrator/form-akte-kematian') }}" class="bg-green-700 rounded-sm text-white px-3 py-1 hover:bg-green-900">Tambah Data</a>
                    <a href="" class="bg-blue-700 rounded-sm text-white px-3 py-1 hover:bg-blue-900">Lihat Data</a>
                    <a href="" class="bg-yellow-700 rounded-sm text-white px-3 py-1 hover:bg-yellow-900">Edit Data</a>
                    <a href="" class="bg-red-700 rounded-sm text-white px-3 py-1 hover:bg-red-900">Hapus Data</a>
                </div>
                <table border="1" class="w-full bg-[#C1C0C0] rounded-md shadow-md shadow-slate-700 mb-20 text-center">
                    <thead class="bg-slate-600 text-white border border-white font-semibold">
                        <tr class="border border-white border-b-white text-lg">
                            <td class="border border-white border-b-white">NO</td>
                            <td class="border border-white border-b-white">NIK</td>
                            <td class="border border-white border-b-white">NAMA LENGKAP</td>   
                            <td class="border border-white border-b-white">FILE</td>
                        </tr>    
                    </thead>
                    <tbody class=" border border-white text-black text-base">
                        @foreach ($akte_kematians as $data)
                        <tr class="border border-white border-b-white">
                            <td class="border border-white border-b-white">{{ $data->id }}.</td>
                            <td class="border border-white border-b-white">{{ $data->nik }}</td>
                            <td class="border border-white border-b-white">{{ $data->nama }}</td>
                            <td class="border border-white border-b-white"><a href="{{ url('administrator/download/'.$data->id) }}" target="_blank"><button type="button" class="bg-cyan-700 hover:bg-green-700 text-white px-3 rounded-lg my-3">Download File</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> --}}

                {{-- @php
                    $counter = 1
                @endphp --}}

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
                    {{-- <input type="text" name="pdf" placeholder="alamat" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg"> --}}
                </div>
                    <div class="col-span-2">
                        <label for="" class="text-2xl">Tanggal Lahir</label>
                        
                        <input type="datetime-local" name="tanggallahir" id="tanggallahir" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg">
                    </div>
                    {{-- <input type="datetime"> --}}
                    
                    {{-- <div class="col-span-2 md:col-span-1">
                    <label for="" class="text-2xl">Tempat Tanggal Lahir</label>
                    <input type="text" name="ayah" placeholder="tempat tanggal lahir" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg">
                    </div> --}}

                    {{-- <div class="col-span-2 md:col-span-1">
                        <label for="" class="text-2xl"> Nama Ibu</label>
                        <br>
                    <input type="text" name="ibu" placeholder="ibu" class="w-full h-12 mt-2 rounded-lg pl-2 shadow-lg">
                    </div> --}}
                    <div class="flex justify-center w-full  col-span-2 pb-10 pt-5">
                        <button type="submit" class="px-40 py-2 bg-green-500 rounded-lg shadow-lg font-bold hover:bg-green-950 hover:text-white">Submit</button>
                    </div>   
                </form>
            </div>
                {{-- <div class="h-1 w-full bg-black mt-10"></div>
            <h1 class="text-4xl text-center ">Dokumen Pendukung </h1>
            <p class="text-2xl">1.Akta kelahiran:</p>
            <a href="{{ url('administrator/form-akte/download') }}" download="filename.pdf" class="bg-green-700 text-xl ml-5 mb-10 "><button class="bg-yellow-400 px-5 py-2 flex text-4xl" type="button"><span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10"><path d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM13 12V8H11V12H8L12 16L16 12H13Z" ></path></svg></span> download</button></a> --}}
            </main>
    
            
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    
    </script>
    <script>
        var dt = new Date();
document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();

    </script>
</body>
</html>