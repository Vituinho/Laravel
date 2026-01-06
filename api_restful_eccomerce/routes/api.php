<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('usuarios/login', [App\Http\Controllers\Api\UsuarioController::class, 'login']);
Route::post('usuarios/register', [App\Http\Controllers\Api\UsuarioController::class, 'register']);
Route::get('produtos', [App\Http\Controllers\Api\ProdutoController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('produtos', App\Http\Controllers\Api\ProdutoController::class)->except(['index']);
});
