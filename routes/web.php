<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Maestros\ColegioController;
use App\Http\Controllers\Maestros\CategoriaController;
use App\Http\Controllers\Maestros\ProductoController;
use App\Http\Controllers\Maestros\SedeController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('colegios', ColegioController::class);
    Route::resource('categorias', CategoriaController::class);  
    Route::resource('productos', ProductoController::class);  
    Route::resource('sedes', SedeController::class);

});

require __DIR__.'/auth.php';