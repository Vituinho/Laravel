<?php

namespace App\Http\Controllers\Web;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        return view('usuarios.edit');
    }
}
