<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\emprestimoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cadastrar_usuario', [App\Http\Controllers\UsuarioController::class, 'cadastrar_usuarios']);

Route::get('/listar_usuario', [App\Http\Controllers\UsuarioController::class, 'listar_usuarios']);

Route::get('/ver_usuario', [App\Http\Controllers\UsuarioController::class, 'ver_usuarios']);

Route::get('/listar_usuario_simples', [App\Http\Controllers\UsuarioController::class, 'listar_usuarios_simples']);

Route::delete('/deletar_usuarios', [App\Http\Controllers\UsuarioController::class, 'deletar_usuario']);

Route::post('/cadastrar_local', [App\Http\Controllers\LocalController::class, 'cadastrar_local']);

Route::get('/listar_locais', [App\Http\Controllers\LocalController::class, 'listar_locais']);

Route::delete('/deletar_local', [App\Http\Controllers\LocalController::class, 'deletar_local']);

Route::post('/cadastrar_emprestimo', [App\Http\Controllers\emprestimoController::class, 'cadastrar_emprestimo']);

Route::get('/listar_emprestimos', [App\Http\Controllers\emprestimoController::class, 'listar_emprestimos']);

Route::delete('/deletar_emprestimo', [App\Http\Controllers\emprestimoController::class, 'deletar_emprestimo']);