<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', App\Http\Controllers\Web\UsuarioController::class);
Route::resource('produtos', App\Http\Controllers\Web\ProdutoController::class);