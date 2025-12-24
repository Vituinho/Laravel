<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('curso.index', ['cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request)
    {
        $curso = Curso::create([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        if ($curso) {
            return redirect()->route('curso.index')->with('success', 'Curso cadastrado com sucesso!!');
        }
        else {
            return redirect()->route('curso.index')->with('error', 'Não foi possível cadastrar esse curso!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        return view('curso.update', ['curso' => $curso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Cursorequest $request, Curso $curso)
    {
        $atualizou = $curso->update([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        if ($atualizou) {
            return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso!!');
        }
        else {
            return redirect()->route('curso.index')->with('error', 'Não foi possível atualizar esse curso!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $deletou = $curso->delete();

        if ($deletou) {
            return redirect()->route('curso.index')->with('success', 'Curso removido com sucesso!!');
        }
        else {
            return redirect()->route('curso.index')->with('error', 'Não foi possível remover esse curso!!');
        }
    }
}
