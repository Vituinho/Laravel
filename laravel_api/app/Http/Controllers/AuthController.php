<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = $request->validate([
            "name" => "required|min:10|string",
            "email" => "required|email:rfc,dns|string|min:10|unique:users",
            "password" => "required|min:8",
        ]);

        $user = User::create([
            "name" => $validator['name'],
            "email" => $validator['email'],
            "password" => Hash::make($validator['password']),
        ]);

        if ($user) {
            $token = $user->createToken('api_token', ['post:create', 'post:read'])->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token,
            ],201);

            return response()->json([
                'status' => 500,
                'mensagem' => 'Erro ao criar o usuário',
            ],500);
        }
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            "email" => "required|email:rfc,dns|string|min:10",
            "password" => "required|min:8",
        ]);

        if (!Auth::attempt([
            'email' => $validator['email'],
            'password' => $validator['password']
        ])) {
            return response()->json([
                'message' => 'Credenciais inválidas'
            ], 401);
        }

        $user = User::where('email', $validator['email'])->first();

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'token' => $token
        ], 200);
    }

    public function logout(Request $request)
    {

        $validateToken = PersonalAccessToken::findToken($request['token']);

        if ($validateToken) {
            
            $validateToken->delete();
            
            return response()->json([
                'message' => 'Logout realizado com sucesso'
            ], 201);
        }

        return response()->json([
            'status' => 500,
            'message' => 'Token Inválido'
        ], 500);
    }

}
