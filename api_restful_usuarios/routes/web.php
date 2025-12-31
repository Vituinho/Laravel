<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', UsuarioController::class);