<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [App\Http\Controllers\Web\UsuarioController::class, 'register']);
Route::get('login', [App\Http\Controllers\Web\UsuarioController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Web\UsuarioController::class, 'logout']);
Route::resource('produtos', App\Http\Controllers\Web\ProdutoController::class);