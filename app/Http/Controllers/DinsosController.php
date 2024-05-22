<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DinsosController extends Controller
{
    public function index(){
        return view('dinsos.dashboard');
     }
}
