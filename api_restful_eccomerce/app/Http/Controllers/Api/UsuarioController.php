<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $usuario = User::create($request->all());
        return response()->json($usuario, 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token
            ], 200);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return response()->json($usuario);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioRequest $request, User $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
