<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\UsuarioToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\AdminToken;

class UsuarioController extends Controller
{
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
            if ($usuario->nivel == 2) {
                Admin::create([
                    'usuario_id' => $usuario->id, 
                    'nome' => $usuario->nome,
                    'email' => $usuario->email,
                    'senha' => $usuario->senha, 
                ]);
            }

            return response()->json(['message' => 'Usuário cadastrado com sucesso', 'error' => 'n'], 201);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar usuário ', 'error' => 's', 'msg_error' => $th->getMessage()], 200);
        }

    }

    public function ver_usuarios(Request $request)
    {

        $usuarios = Usuario::find($request->id);
        $usuarios->emprestimos; // Carrega os empréstimos relacionados ao usuário
        if ($usuarios) {
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

    public function deletar_usuario(Request $request)
    {
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

    public function atualizar_usuario(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:usuarios',
            'senha' => 'required|string',
            'turma' => 'nullable|string|max:255',
            'nivel' => 'required|string|max:1',
        ]);

        try {
            $usuario = Usuario::find($request->input('id'));

            if ($usuario->email != $request->input('email')) {
                $usuario_email = Usuario::where('email', $request->input('email'))->first();
                if ($usuario_email) {
                    return response()->json(['message' => 'Erro ao atualizar usuário: Email já cadastrado', 'erro' => 's'], 500);
                }
            }

            $usuario->nome = $request->input('nome');
            $usuario->email = $request->input('email');
            $usuario->senha = Hash::make($request->input('senha'));
            $usuario->turma = $request->input('turma');
            $usuario->nivel = $request->input('nivel');
            $usuario->save();

            return response()->json(['message' => 'Usuário atualizado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao atualizar usuário: '.$th->getMessage(), 'erro' => 's'], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('email', '=', $request->input('email'))->first();
        if ($usuario) {

            if (Hash::check($request->senha, $usuario->senha)) {
                $usuario_token = new UsuarioToken;
                $usuario_token->usuario_id = $usuario->id;
                $usuario_token->token = Hash::make($usuario->id.$usuario->email.now());
                $usuario_token->valido_ate = now()->addDays(7);
                $usuario_token->save();

                return response()->json(['message' => 'Login realizado com sucesso!', 'erro' => 'n', 'token' => $usuario_token->token], 200);

            } else {
                return response()->json(['message' => 'Usuário ou senha incorretos!', 'erro' => 's'], 200);
            }

        } else {
            return response()->json(['message' => 'Email não encontrado!', 'erro' => 's'], 200);
        }

    }

    public function logout(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:usuario_token,id',
        ]);

        try {
            $usuario_token = UsuarioToken::find($request->id);
            $usuario_token->delete();

            return response()->json(['message' => 'Usuario deslogado com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deslogar usuario', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }

    public function loginadm(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);

        $admin = Admin::where('email', '=', $request->input('email'))->first();
        if ($admin) {

            if (Hash::check($request->senha, $admin->senha)) {
                $admin_token = new AdminToken;
                $admin_token->usuario_id = $admin->usuario_id;
                $admin_token->token = Hash::make($admin->id.$admin->email.now());
                $admin_token->valido_ate = now()->addDays(7);
                $admin_token->save();

                return response()->json(['message' => 'Login realizado com sucesso!', 'erro' => 'n', 'token' => $admin_token->token], 200);

            } else {
                return response()->json(['message' => 'Administrador ou senha incorretos!', 'erro' => 's'], 200);
            }

        } else {
            return response()->json(['message' => 'Email não encontrado!', 'erro' => 's'], 200);
        }
    }
    public function logoutadm(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:admin_token,id',
        ]);

        try {
            $admin_token = AdminToken::find($request->id);
            $admin_token->delete();

            return response()->json(['message' => 'Administrador deslogado com sucesso', 'error' => 'n'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deslogar administrador', 'error' => 's', 'msg_error' => $th->getMessage()], 500);
        }
    }
}    
