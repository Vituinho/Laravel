<?php

namespace App\Http\Controllers\Api;

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
        return response()->json(Tarefa::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'concluida' => 'boolean'
        ]);

        $tarefa = Tarefa::create($data);
        return response()->json($tarefa, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
