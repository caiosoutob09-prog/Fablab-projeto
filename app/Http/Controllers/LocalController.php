<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;
use Illuminate\Support\Facades\Validator;

class LocalController extends Controller
{
    public function cadastrar_local(Request $request){

        $request->validate([
            'espaço' => 'required|string|max:255',
            'identificacao' => 'required|max:255|unique:locais',
            'descricao' => 'required|string',
        ]);

        try {

            $local = new Local;
            $local->espaço = $request->input('espaço');
            $local->identificacao = $request->input('identificacao');
            $local->descricao = $request->input('descricao');

            $local->save();

            return response()->json(['message' => 'Local cadastrado com sucesso','error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar local ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }

    public function deletar_local(Request $request){
       $request->validate([
            'id' => 'required|integer|exists:locais,id',
        ]);

        try {
            $local = Local::find($request->id);
            $local->delete();

            return response()->json(['message' => 'Local deletado com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar local', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }

    public function listar_locais(Request $request)
    {
        $locais = Local::all();
        return response()->json(['locais' => $locais, 'error' => 'n'], 200);
    }
    
}
