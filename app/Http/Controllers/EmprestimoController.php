<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use Illuminate\Support\Facades\Validator;

class EmprestimoController extends Controller{

    public function emprestimo(request $request){
        return view('Formulario_emprestimo');
    }

    public function emprestar(Request $request)
    {

        $request->validate([
            'item_id' => 'required|integer|exists:items,id',
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'quantidade' => 'required|integer|min:1',
            'responsavel' => 'nullable|string|max:255',
            'horario_retirada' => 'required|date',
            'prazo' => 'required|date',
            'horario_devolucao' => 'nullable|date'
        ]);

        try {

            $emprestimo = new Emprestimo;
            $emprestimo->usuario_id = $request->input('usuario_id');
            $emprestimo->item_id = $request->input('item_id');
            $emprestimo->quantidade = $request->input('quantidade');
            $emprestimo->responsavel = $request->input('responsavel');
            $emprestimo->horario_retirada = $request->input('horario_retirada');
            $emprestimo->prazo = $request->input('prazo');
            $emprestimo->horario_devolucao = $request->input('horario_devolucao');

            $emprestimo->save();

            return response()->json(['message' => 'Empréstimo cadastrado com sucesso','error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar item ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }

    public function deletar_emprestimo(Request $request){
       $request->validate([
            'id' => 'required|integer|exists:emprestimos,id',
        ]);

        try {
            $emprestimo = Emprestimo::find($request->id);
            $emprestimo->delete();

            return response()->json(['message' => 'Empréstimo deletado com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar empréstimo', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }

}
