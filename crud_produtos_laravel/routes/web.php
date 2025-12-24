<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('produtos', 'App\Http\Controllers\ProdutosController');

// Rotas de Login e Cadastro

// Exibir o formulário de login
Route::get('/logar', [App\Http\Controllers\UsuariosController::class, 'MostrarLogin'])->name('logar');

// Exibir o formulário de registro
Route::get('/registrar', [App\Http\Controllers\UsuariosController::class, 'MostrarRegistro'])->name('registrar');

// Processar o login (POST)
Route::post('/logar', [App\Http\Controllers\UsuariosController::class, 'Logar']);

// Processar o cadastro (POST)
Route::post('/registrar', [App\Http\Controllers\UsuariosController::class, 'Registrar']);

Route::middleware('auth')->group(function () {
    Route::resource('produtos', ProdutosController::class);
});