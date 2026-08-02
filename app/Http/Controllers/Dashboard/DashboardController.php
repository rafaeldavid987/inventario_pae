<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Colegio;
use App\Models\Categoria;
use App\Models\Producto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalColegios = Colegio::where('estado', true)->count();

        $totalCategorias = Categoria::where('estado', true)->count();

        $totalProductos = Producto::where('estado', true)->count();

        $totalSedes = 0;

        return view('dashboard.index', compact(
            'totalColegios',
            'totalCategorias',
            'totalProductos',
            'totalSedes'
        ));
    }
}