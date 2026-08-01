<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColegioRequest;
use App\Models\Colegio;
use App\Models\Municipio;

class ColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $colegios = Colegio::orderBy('nombre')->paginate(10);

    return view('maestros.colegios.index', compact('colegios'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $municipios = Municipio::orderBy('nombre')->get();

    return view('maestros.colegios.create', compact('municipios'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColegioRequest $request)
{
    Colegio::create($request->validated());

    return redirect()
        ->route('colegios.index')
        ->with('success', 'Colegio registrado correctamente.');
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
    $colegio = Colegio::findOrFail($id);

    $municipios = Municipio::orderBy('nombre')->get();

    return view('maestros.colegios.edit', compact('colegio', 'municipios'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ColegioRequest $request, string $id)
    {
    $colegio = Colegio::findOrFail($id);

    $colegio->update($request->validated());

    return redirect()
        ->route('colegios.index')
        ->with('success', 'Colegio actualizado correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
