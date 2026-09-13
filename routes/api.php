<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ReservaController;

Route::apiResource('salas', SalaController::class);

Route::apiResource('reservas', ReservaController::class);
