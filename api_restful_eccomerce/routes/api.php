<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('usuarios', App\Http\Controllers\Api\UsuarioController::class);
Route::apiResource('produtos', App\Http\Controllers\Api\ProdutoController::class);