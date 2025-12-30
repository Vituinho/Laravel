<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('usuarios', UsuarioController::class);

// ele vem com todas as rotas: index, store, show, update, destroy 

// get    /usuarios          -> index
// post   /usuarios          -> store
// get    /usuarios/{id}     -> show
// put    /usuarios/{id}     -> update
// delete /usuarios/{id}     -> destroy