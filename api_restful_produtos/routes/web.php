<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produtos', App\Http\Controllers\Web\ProdutoController::class);