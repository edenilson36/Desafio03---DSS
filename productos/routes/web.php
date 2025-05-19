<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController; 

// ruta principal que muestra la vista welcome
Route::get('/', function () {
    return view('welcome');
});

// todas las rutas necesarias para el crud de productos usando el controlador
Route::resource('producto', ProductoController::class);
