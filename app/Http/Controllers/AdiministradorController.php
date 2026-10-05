<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdiministradorController extends Controller
{
    public function adimin(Request $request)
    {
        return view('Login_admin');
    }

    public function admin(Request $request)
    {
        return view('cadastro_item');
    }
}
