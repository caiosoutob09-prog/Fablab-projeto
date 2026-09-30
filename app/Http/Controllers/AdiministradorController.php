<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdiministradorController extends Controller
{
    public function adimin(request $request){
        return view('Login_admin');
    }
}
