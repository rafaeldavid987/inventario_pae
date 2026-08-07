<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $categorias = Categoria::orderBy('nombre')->paginate(10);

    return view('maestros.categorias.index', compact('categorias'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    return view('maestros.categorias.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
{
    Categoria::create($request->validated());

    return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoría registrada correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $categoria = Categoria::findOrFail($id);

    return view('maestros.categorias.edit', compact('categoria'));
}
 
/**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, string $id)
{
    $categoria = Categoria::findOrFail($id);

    $categoria->update($request->validated());

    return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoría actualizada correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $categoria = Categoria::findOrFail($id);

    $categoria->update([
        'estado' => !$categoria->estado
    ]);

    $mensaje = $categoria->estado
        ? 'Categoría activada correctamente.'
        : 'Categoría desactivada correctamente.';

    return redirect()
        ->route('categorias.index')
        ->with('success', $mensaje);
}
}
