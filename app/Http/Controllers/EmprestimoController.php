<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function emprestimo(Request $request)
    {
        return view('Formulario_emprestimo');
    }

    public function emprestar(Request $request)
    {

        $request->validate([
            'item_id' => 'required|integer|exists:itens,id',
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'quantidade' => 'required|integer|min:1',
            'responsavel' => 'nullable|string|max:255',
            'horario_retirada' => 'required|date',
            'prazo' => 'required|date',
            'horario_devolucao' => 'nullable|date',
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

            return response()->json(['message' => 'Empréstimo cadastrado com sucesso', 'error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar item ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }

    public function deletar_emprestimo(Request $request)
    {
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

    public function listar_emprestimos(Request $request)
    {
        $emprestimos = Emprestimo::all();

        return response()->json(['emprestimos' => $emprestimos, 'error' => 'n'], 200);
    }

  public function atualizar_emprestimo(Request $request)
    {
        $request->validate([
            'item_id' => 'required|integer|exists:itens,id',
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'quantidade' => 'required|integer|min:1',
            'responsavel' => 'nullable|string|max:255',
            'horario_retirada' => 'required|date',
            'prazo' => 'required|date',
            'horario_devolucao' => 'nullable|date',
        ]);

        try {
            $emprestimo = Emprestimo::find($request->input('id'));

            if ($emprestimo) {
                $emprestimo->item_id = $request->input('item_id');
                $emprestimo->usuario_id = $request->input('usuario_id');
                $emprestimo->quantidade = $request->input('quantidade');
                $emprestimo->responsavel = $request->input('responsavel');
                $emprestimo->horario_retirada = $request->input('horario_retirada');
                $emprestimo->prazo = $request->input('prazo');
                $emprestimo->horario_devolucao = $request->input('horario_devolucao');
                $emprestimo->save();

                return response()->json(['message' => 'Empréstimo atualizado com sucesso!', 'error' => 'n'], 200);
            }

            return response()->json(['message' => 'Empréstimo não encontrado', 'error' => 's'], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar empréstimo: '.$th->getMessage(), 'error' => 's'], 500);
        }
    }
}
