<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginApiMiddleware;
use App\Http\Middleware;

// Usuário autenticado
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Usuários
Route::post('/cadastrar_usuario', [UsuarioController::class, 'cadastrar_usuarios']);
Route::get('/listar_usuario', [UsuarioController::class, 'listar_usuarios']);
Route::get('/listar_usuario_simples', [UsuarioController::class, 'listar_usuarios_simples']);
Route::get('/ver_usuario', [UsuarioController::class, 'ver_usuarios']);
Route::put('/atualizar_usuario', [UsuarioController::class, 'atualizar_usuario'])->middleware(LoginApiMiddleware::class);
Route::delete('/deletar_usuario', [UsuarioController::class, 'deletar_usuario'])->middleware(LoginApiMiddleware::class);

// Locais
Route::post('/cadastrar_local', [LocalController::class, 'cadastrar_local']);
Route::get('/listar_locais', [LocalController::class, 'listar_locais']);
Route::put('/atualizar_local', [LocalController::class, 'atualizar_local']);
Route::delete('/deletar_local', [LocalController::class, 'deletar_local']);

// Itens
Route::post('/cadastrar_item', [ItemController::class, 'cadastrar_item']);
Route::get('/listar_items', [ItemController::class, 'listar_items']);
Route::put('/atualizar_item', [ItemController::class, 'atualizar_item']);
Route::delete('/deletar_item', [ItemController::class, 'deletar_item']);
        
// Categorias
Route::post('/cadastrar_categoria', [CategoriaController::class, 'cadastrar_categoria']);
Route::get('/listar_categorias', [CategoriaController::class, 'listar_categorias']);
Route::put('/atualizar_categoria', [CategoriaController::class, 'atualizar_categoria']);
Route::delete('/deletar_categoria', [CategoriaController::class, 'deletar_categoria']);

// Empréstimos
Route::post('/emprestar', [EmprestimoController::class, 'emprestar']);
Route::get('/listar_emprestimos', [EmprestimoController::class, 'listar_emprestimos']);
Route::put('/atualizar_emprestimo', [EmprestimoController::class, 'atualizar_emprestimo']);
Route::delete('/deletar_emprestimo', [EmprestimoController::class, 'deletar_emprestimo']);


//Login
Route::post('/login', [UsuarioController::class, 'login']);
