<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;

class AdiministradorController extends Controller
{
    public function adimin(Request $request)
    {
        return view('Login_admin');
    }

    public function admin(Request $request)
    {
        $dados = Emprestimo::select('emprestimos.id', 'usuarios.nome as usuario_nome', 'itens.nome as item_nome', 'emprestimos.quantidade', 'emprestimos.horario_retirada', 'emprestimos.prazo', 'emprestimos.horario_devolucao')
        ->join('usuarios', 'emprestimos.usuario_id', '=', 'usuarios.id')
        ->join('itens', 'emprestimos.item_id', '=', 'itens.id')
        ->get();

        return view('cadastro_item', [
            'dados' => $dados,
        ]);
    }
}
