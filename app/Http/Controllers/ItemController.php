<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function emprestar(Request $request)
    {

        $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'local_id' => 'required|integer|exists:locals,id',
            'nome' => 'required|string',
            'qtd_total' => 'nullable|integer|min:0',
            'qtd_disponivel' => 'required|integer|min:0',
            'descricao' => 'required|string|max:255',
        ]);

        try {

            $item = new Item;
            $item->categoria_id = $request->input('categoria_id');
            $item->local_id = $request->input('local_id');
            $item->nome = $request->input('nome');
            $item->qtd_total = $request->input('qtd_total');
            $item->qtd_disponivel = $request->input('qtd_disponivel');
            $item->descricao = $request->input('descricao');

            $item->save();

            return response()->json(['message' => 'Item cadastrado com sucesso','error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar item ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }
    public function listar_items(Request $request)
    {
        $items = Item::all();
        return response()->json(['items' => $items, 'error' => 'n'], 200);
    }
    public function deletar_item(Request $request){
       $request->validate([
            'id' => 'required|integer|exists:items,id',
        ]);

        try {
            $item = Item::find($request->id);
            $item->delete();

            return response()->json(['message' => 'Item deletado com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar item', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }
    
}
