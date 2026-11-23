<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function mostrarhome(Request $request)
   {
    $usuario = $request->usuario;
       return view('home')->with('usuario', $usuario);
   }
}
