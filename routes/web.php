<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\DinsosController;
use App\Http\Controllers\FasyangkesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tamplate',function(){
    return view('tamplate');
});



Route::get('/home',function(){
    return view('home');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/blank', function () {
    return view('blank');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/administrator/menu', function(){
    return view('administrator.menu');
});

// AKTE
Route::match(['get','post'],'/administrator/menu-akte',[AdministratorController::class,'akte']);
Route::match(['get','post'],'/administrator/form-akte',[AdministratorController::class,'store']);
Route::match(['get','post'],'/administrator/menu-akte/edit/{id}',[AdministratorController::class,'edit_akte']);
Route::put('/administrator/update-akte/{id}', [AdministratorController::class, 'update_akte']);
Route::get('/administrator/cari-akte',[AdministratorController::class,'cari_akte']);
Route::match(['get','post'],'/administrator/menu-akte/delete/{id}',[AdministratorController::class,'hapus_akte']);


// AKTE KEMATIAN
Route::match(['get','post'],'/administrator/menu-akte-kematian',[AdministratorController::class,'akte_kematian']);
Route::get('/administrator/cari-akte-kematian',[AdministratorController::class,'cari_akte_kematian']);
Route::match(['get','post'],'/administrator/form-akte-kematian',[AdministratorController::class,'tambah_akte_kematian']);
Route::match(['get','post'],'/administrator/menu-akte-kematian/edit/{id}',[AdministratorController::class,'edit_akte_kematian']);
Route::put('/administrator/update-akte-kematian/{id}', [AdministratorController::class, 'update_akte_kematian']);
Route::match(['get','post'],'/administrator/menu-akte-kematian/delete/{id}',[AdministratorController::class,'hapus_akte_kematian']);


Route::match(['get','post'],'/administrator/form-ktp',[AdministratorController::class,'dataktp']);
// Route::match(['get','post'],'administrator/form-ktp',[AdministratorController::class,'ktp']);

// testing muncul form-akte-kematian
// Route::get('/administrator/form-akte-kematian', function(){
//     return view('administrator.form-akte-kematian');
// });
//

// metode nya get lalu masukkan namespace AuthController 
// attribute name merupakan penamaan dari route yang kita buat
// kita tinggal panggil fungsi route(name) pada layout atau controller
Route::get('login', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:dinsos']], function () {
        Route::resource('dinsos', DinsosController::class);
    });
    Route::group(['middleware' => ['cek_login:fasyangkes']], function () {
        Route::resource('fasyangkes', FasyangkesController::class);
    });
    Route::group(['middleware' => ['cek_login:administrator']], function () {
        Route::resource('administrator', AdministratorController::class);
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::resource('user', UserController::class);
    });
});

Route::get('/administrator/form-akte/download', [AdministratorController::class,'downloadfile']);
// Route::get('/administrator/download/{id}', [AdministratorController::class,'downloadaktekematian']);

// Route::get('administrator/download/{id}', [AdministratorController::class, 'downloadaktekematian']);
Route::get('administrator/download/{id}', [AdministratorController::class, 'downloadaktekematian']);

// Form KTP

