<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/create', [UsuarioController::class, 'create']);