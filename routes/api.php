<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;

Route::get('/ventas', [VentaController::class, 'apiIndex']);
Route::get('/ventas/{id}', [VentaController::class, 'apiShow']);