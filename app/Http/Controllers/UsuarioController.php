<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller{
    public function inicio(Request $request)
    {
        return view('inicio');
    }

    public function cadastrar_usuarios(Request $request)
    {

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios',
            'senha' => 'required|string',
            'turma' => 'nullable|string|max:255',
            'nivel' => 'required|string|max:1',
        ]);

        try {

            $usuario = new Usuario;
            $usuario->nome = $request->input('nome');
            $usuario->email = $request->input('email');
            $usuario->senha = Hash::make($request->input('senha'));
            $usuario->turma = $request->input('turma');
            $usuario->nivel = $request->input('nivel');

            $usuario->save();

            return response()->json(['message' => 'Usuário cadastrado com sucesso','error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar usuário ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }

    public function ver_usuarios(Request $request){

        $usuarios = Usuario::find($request->id);
        if($usuarios) {
            return response()->json(['usuarios' => $usuarios, 'error' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Usuário não encontrado', 'error' => 's'], 404);
        }
        }

    public function listar_usuarios(Request $request)
    {
        $usuarios = Usuario::all();
        return response()->json(['usuarios' => $usuarios, 'error' => 'n'], 200);
    }

    public function listar_usuarios_simples(Request $request)
    {
        $usuarios = Usuario::select('id', 'nome', 'email')->get();
        return response()->json(['usuarios' => $usuarios, 'error' => 'n'], 200);
    }

    public function deletar_usuario(Request $request){
       $request->validate([
            'id' => 'required|integer|exists:usuarios,id',
        ]);

        try {
            $usuario = Usuario::find($request->id);
            $usuario->delete();

            return response()->json(['message' => 'Usuário deletado com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar usuário', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }



}
