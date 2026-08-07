<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\Controller;
use App\Http\Requests\SedeRequest;
use App\Models\Colegio;
use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $sedes = Sede::with('colegio')
        ->when($buscar, function ($query) use ($buscar) {
            $query->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('codigo', 'like', "%{$buscar}%");
        })
        ->orderBy('nombre')
        ->paginate(10);

    return view('maestros.sedes.index', compact('sedes', 'buscar'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colegios = Colegio::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('maestros.sedes.create', compact('colegios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SedeRequest $request)
    {
        Sede::create($request->validated());

        return redirect()
            ->route('sedes.index')
            ->with('success', 'Sede registrada correctamente.');
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
        $sede = Sede::findOrFail($id);

        $colegios = Colegio::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('maestros.sedes.edit', compact('sede', 'colegios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SedeRequest $request, string $id)
    {
        $sede = Sede::findOrFail($id);

        $sede->update($request->validated());

        return redirect()
            ->route('sedes.index')
            ->with('success', 'Sede actualizada correctamente.');
    }

                    /**
                     * Remove the specified resource from storage.
                     */
                    public function destroy(string $id)
                    {
                        $sede = Sede::findOrFail($id);

                        $sede->update([
                            'estado' => !$sede->estado
                        ]);

                        $mensaje = $sede->estado
                            ? 'Sede activada correctamente.'
                            : 'Sede desactivada correctamente.';

                        return redirect()
                            ->route('sedes.index')
                            ->with('success', $mensaje);
                    }
}