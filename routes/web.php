<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputadorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Primero las rutas personalizadas
Route::get('/computador/buscar', [ComputadorController::class, 'buscar'])->name('computador.buscar');
Route::post('/computador/actualizar/{id}', [ComputadorController::class, 'actualizar'])->name('computador.actualizar');

// Luego las rutas RESTful del recurso
Route::resource('computador', ComputadorController::class);

// Puedes mantener esta ruta si prefieres que /computadores apunte al index
Route::get('/home', [ComputadorController::class, 'index']);
Route::get('/', [ComputadorController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
