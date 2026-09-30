<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function inicio(request $request){
        return view('inicio');
    }
}
