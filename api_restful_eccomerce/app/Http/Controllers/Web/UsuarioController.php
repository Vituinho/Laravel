<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function login()
    {
        return view('usuarios.index');
    }

    public function register()
    {
        return view('usuarios.create');
    } 

    public function edit(Produto $produto)
    {
        return view('usuarios.edit');
    }
}
