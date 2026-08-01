<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Maestros\ColegioController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('colegios', ColegioController::class);

});

require __DIR__.'/auth.php';