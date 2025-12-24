<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LogarRequest;
use App\Http\Requests\RegistrarRequest;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function MostrarLogin()
    {
        return view('usuarios.login');
    } 

    public function MostrarRegistro()
    {
        return view('usuarios.register');
    }

    public function Logar(LogarRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('produtos.index');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    
    public function Registrar(RegistrarRequest $request)
    {
        if (!(Usuarios::where('email', $request->email)->exists())) {
                Usuarios::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect('/logar')->with('success', 'Conta criada!');
        } else {
            return back()->withErrors([
                'email' => 'O email já está em uso.',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
