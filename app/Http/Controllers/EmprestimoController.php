<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function emprestimo(request $request){
        return view('Formulario_emprestimo');
    }
}
