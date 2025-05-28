<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputadorController;

Route::get('/', function () {
    return view('welcome');
});

// Primero las rutas personalizadas
Route::get('/computador/buscar', [ComputadorController::class, 'buscar'])->name('computador.buscar');

// Luego las rutas RESTful del recurso
Route::resource('computador', ComputadorController::class);

// Puedes mantener esta ruta si prefieres que /computadores apunte al index
Route::get('/computadores', [ComputadorController::class, 'index']);
