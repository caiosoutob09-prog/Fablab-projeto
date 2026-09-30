<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdiministradorController;
use App\Http\Controllers\EmprestimoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [UsuarioController::class, 'inicio']) ->name('tela_inicio');

Route::get('/', [UsuarioController::class, 'inicio']) ->name('tela_inicio');
Route::get('/login_admin', [AdiministradorController::class, 'adimin']) ->name('login_admin');  
Route::get('/emprestimo', [EmprestimoController::class, 'emprestimo']) ->name('tela_emprestimo');
