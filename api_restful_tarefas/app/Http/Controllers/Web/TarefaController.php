<?php

namespace App\Http\Controllers\Web;

use App\Models\Tarefa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tarefas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefas.create');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        return view('tarefas.edit');
    }

}
