<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function cadastrar_item(Request $request)
    {

        $request->validate([
            'categoria_id' => 'required|integer|exists:categorias,id',
            'local_id' => 'required|integer|exists:locais,id',
            'nome' => 'required|string',
            'qtd_total' => 'required|integer|min:0',
            'qtd_disponivel' => 'required|integer|min:0',
            'descricao' => 'required|string|max:255',
        ]);

        try {

            $item = new Item;
            $item->categoria_id = $request->input('categoria_id');
            $item->local_id = $request->input('local_id');
            $item->nome = $request->input('nome');
            $item->quantidade_total = $request->input('qtd_total');
            $item->quantidade_disponivel = $request->input('qtd_disponivel');
            $item->descricao = $request->input('descricao');

            $item->save();

            return response()->json(['message' => 'Item cadastrado com sucesso', 'error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar item ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }

    public function listar_items(Request $request)
    {
        $items = Item::all();

        return response()->json(['items' => $items, 'error' => 'n'], 200);
    }

    public function deletar_item(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:itens,id',
        ]);

        try {
            $item = Item::find($request->id);
            $item->delete();

            return response()->json(['message' => 'Item deletado com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar item', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }

    public function atualizar_item(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:itens,id',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'local_id' => 'required|integer|exists:locais,id',
            'nome' => 'required|string',
            'qtd_total' => 'required|integer|min:0',
            'qtd_disponivel' => 'required|integer|min:0',
            'descricao' => 'required|string|max:255',
        ]);

        try {
            $item = Item::findOrFail($request->input('id'));
            

            $item->categoria_id = $request->input('categoria_id');
            $item->local_id = $request->input('local_id');
            $item->nome = $request->input('nome');
            $item->quantidade_total = $request->input('qtd_total');
            $item->quantidade_disponivel = $request->input('qtd_disponivel');
            $item->descricao = $request->input('descricao');
            $item->save();

            return response()->json(['message' => 'Item atualizado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar item: '.$th->getMessage(), 'erro' => 's'], 500);
        }
    }
}
