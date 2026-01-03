<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        $produto = Produto::create($request->validated());
        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(
            Produto::findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, Produto $produto)
    {
        $produto->update($request->validated());
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return response()->json(null, 204);
    }
}
