<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuthController;

// Rutas públicas de Autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas (Solo usuarios con sesión iniciada)
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('salas.index');
    });

    Route::resource('salas', SalaController::class);
    Route::resource('reservas', ReservaController::class);
});
