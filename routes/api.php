<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\EmprestimoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::post('/cadastrar_usuario', [App\Http\Controllers\UsuarioController::class, 'cadastrar_usuarios']);

Route::get('/listar_usuario', [App\Http\Controllers\UsuarioController::class, 'listar_usuarios']);

Route::get('/ver_usuario', [App\Http\Controllers\UsuarioController::class, 'ver_usuarios']);

Route::get('/listar_usuario_simples', [App\Http\Controllers\UsuarioController::class, 'listar_usuarios_simples']);

Route::delete('/deletar_usuario', [App\Http\Controllers\UsuarioController::class, 'deletar_usuario']);

Route::post('/cadastrar_local', [App\Http\Controllers\LocalController::class, 'cadastrar_local']);

Route::get('/listar_locais', [App\Http\Controllers\LocalController::class, 'listar_locais']);

Route::delete('/deletar_local', [App\Http\Controllers\LocalController::class, 'deletar_local']);

Route::post('/emprestar', [EmprestimoController::class, 'emprestar']);

Route::get('/listar_emprestimos', [EmprestimoController::class, 'listar_emprestimos']);

Route::delete('/deletar_emprestimo', [EmprestimoController::class, 'deletar_emprestimo']);

Route::post('/cadastrar_item', [App\Http\Controllers\ItemController::class, 'cadastrar_item']);

Route::get('/listar_items', [App\Http\Controllers\ItemController::class, 'listar_items']);

Route::delete('/deletar_item', [App\Http\Controllers\ItemController::class, 'deletar_item']);

Route::post('/cadastrar_categoria', [App\Http\Controllers\CategoriaController::class, 'cadastrar_categoria']);

Route::delete('/deletar_categoria', [App\Http\Controllers\CategoriaController::class, 'deletar_categoria']);

Route::get('/listar_categorias', [App\Http\Controllers\CategoriaController::class, 'listar_categorias']);

Route::put('/atualizar_usuario', [App\Http\Controllers\UsuarioController::class, 'atualizar_usuario']);

Route::put('/atualizar_local', [App\Http\Controllers\LocalController::class, 'atualizar_local']);

Route::put('/atualizar_item', [App\Http\Controllers\ItemController::class, 'atualizar_item']);

Route::put('/atualizar_categoria', [App\Http\Controllers\CategoriaController::class, 'atualizar_categoria']);

Route::put('/atualizar_emprestimo', [App\Http\Controllers\EmprestimoController::class, 'atualizar_emprestimo']);