<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tarefas', App\Http\Controllers\Web\TarefaController::class);
