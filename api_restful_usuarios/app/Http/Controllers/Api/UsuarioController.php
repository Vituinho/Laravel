<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Usuario::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
        ]);

        $usuario = Usuario::create($data);
        return response()->json($usuario, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255'
        ]);

        try {
            $usuario->update($data);

            return response()->json([
                'message' => 'Usuário atualizado com sucesso!',
                'usuario' => $usuario
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro ao atualizar usuário'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();

            return response()->json([
                'message' => 'Usuário deletado com sucesso!'
            ], 200);

            } catch (\Throwable $e) {
                return response()->json([
                    'message' => 'Erro ao deletar usuário'
                ], 500);
        }
    }
}
