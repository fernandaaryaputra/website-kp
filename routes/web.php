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

Route::match(['get','post'],'/administrator/form-akte',[AdministratorController::class,'store']);
Route::match(['get','post'],'/administrator/form-akte-kematian',[AdministratorController::class,'akte_kematian']);

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