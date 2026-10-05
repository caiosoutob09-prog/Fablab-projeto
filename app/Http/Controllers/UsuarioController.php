<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function inicio(request $request){
        return view('inicio');
    }
    public function emprestar(Request $request){
        
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|email|max:255|unique:usuarios',
        'item' => 'required|string|max:255',
        'local' => 'required|string|max:255',
        'qtd' => 'required|integer|min:1',
    ]);

    try {
    $emprestimo = new Emprestimos();
    $emprestimo->nome = $request->input('nome');
    $emprestimo->email = $request->input('email');
    $emprestimo->item = $request->input('item');
    $emprestimo->local = $request->input('local');
    $emprestimo->qtd = $request->input('qtd');
    $emprestimo->save();

    } catch (\Throwable $th) {

    }
     
       

}
