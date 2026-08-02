<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('categoria')
            ->orderBy('nombre')
            ->paginate(10);

        return view('maestros.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('maestros.productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        Producto::create($request->validated());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto registrado correctamente.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
{
    $producto = Producto::findOrFail($id);

    $categorias = Categoria::where('estado', true)
        ->orderBy('nombre')
        ->get();

    return view('maestros.productos.edit', compact('producto', 'categorias'));
}

    public function update(ProductoRequest $request, string $id)
{
    $producto = Producto::findOrFail($id);

    $producto->update($request->validated());

    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto actualizado correctamente.');
}

    public function destroy(string $id)
{
    $producto = Producto::findOrFail($id);

    $producto->update([
        'estado' => false
    ]);

    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto desactivado correctamente.');
}
}