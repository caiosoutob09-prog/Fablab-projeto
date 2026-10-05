<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/emprestar', [App\Http\Controllers\UsuarioController::class, 'emprestar'])->name('emprestar');