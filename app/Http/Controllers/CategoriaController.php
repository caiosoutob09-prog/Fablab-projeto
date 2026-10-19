<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function cadastrar_categoria(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        try {

            $categoria = new Categoria;
            $categoria->nome = $request->input('nome');
            $categoria->descricao = $request->input('descricao');

            $categoria->save();

            return response()->json(['message' => 'Categoria cadastrada com sucesso','error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar categoria ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }

    public function listar_categorias(Request $request)
    {
        $categorias = Categoria::all();
        return response()->json(['categorias' => $categorias, 'error' => 'n'], 200);
    }

    public function atualizar_categoria(Request $request)
    {
        $dados = $request->validate([
            'id' => 'required|integer|exists:categorias,id',
            'nome' => 'required|string|max:100',
            'descricao' => 'nullable|string',
        ]);

        try {
            $categoria = Categoria::findOrFail($dados['id']);
            $categoria->nome = $dados['nome'];
            $categoria->descricao = $dados['descricao'] ?? null;
            $categoria->save();

            return response()->json([
                'message' => 'Categoria atualizada com sucesso',
                'error' => 'n',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Erro ao atualizar categoria',
                'error' => 's',
                'msg_error' => $th->getMessage(),
            ], 500);
        }
    }

    public function deletar_categoria(Request $request){
       $request->validate([
            'id' => 'required|integer|exists:categorias,id',
        ]);

        try {
            $categoria = Categoria::find($request->id);
            $categoria->delete();

            return response()->json(['message' => 'Categoria deletada com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar categoria', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }
}
    
