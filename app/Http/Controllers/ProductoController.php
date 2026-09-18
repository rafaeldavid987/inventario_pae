<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();

        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::where('estado', true)->get();

        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:30|unique:productos,codigo',
            'nombre' => 'required|string|max:200',
            'categoria_id' => 'required|exists:categorias,id',
            'unidad_medida' => 'required|string|max:50',
            'marca' => 'nullable|string|max:100',
            'presentacion' => 'nullable|string|max:100',
            'stock_minimo' => 'required|integer|min:0',
            'estado' => 'required|boolean',
        ]);

        Producto::create($request->all());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto registrado correctamente.');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::where('estado', true)->get();

        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'codigo' => 'required|string|max:30|unique:productos,codigo,' . $producto->id,
            'nombre' => 'required|string|max:200',
            'categoria_id' => 'required|exists:categorias,id',
            'unidad_medida' => 'required|string|max:50',
            'marca' => 'nullable|string|max:100',
            'presentacion' => 'nullable|string|max:100',
            'stock_minimo' => 'required|integer|min:0',
            'estado' => 'required|boolean',
        ]);

        $producto->update($request->all());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }
}