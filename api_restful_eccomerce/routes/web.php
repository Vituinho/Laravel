<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [App\Http\Controllers\Web\UsuarioController::class, 'register'])->name('register');
Route::get('login', [App\Http\Controllers\Web\UsuarioController::class, 'login'])->name('login');
Route::post('login', [App\Http\Controllers\Web\UsuarioController::class, 'authenticate'])->name('login.post');
Route::post('logout', [App\Http\Controllers\Web\UsuarioController::class, 'logout'])->name('logout');
Route::resource('produtos', App\Http\Controllers\Web\ProdutoController::class);
