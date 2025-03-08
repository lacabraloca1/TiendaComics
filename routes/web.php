<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// RUTA PRINCIPAL
Route::get('/', function () {
    return redirect()->route('caja.index');
});

// LOGIN
Route::get('/login', function () {
    return view('login');
})->name('login');

// CAJA
Route::get('/caja', function () {
    return view('caja');
})->name('caja.index');

// TICKETS
Route::get('/tickets/nuevo', function () {
    return view('nuevo_ticket');
})->name('tickets.create');

// DEVOLUCIONES
Route::get('/devoluciones', function () {
    return view('devoluciones');
})->name('devoluciones.index');

// PROVEEDORES
Route::get('/proveedores', function () {
    return view('proveedores');
})->name('proveedores.index');

// EMPLEADOS
Route::get('/empleados', function () {
    return view('empleados');
})->name('empleados.index');

// ENVÍOS
Route::get('/envios', function () {
    return view('envios');
})->name('envios.index');

// MEMBRESÍAS
Route::get('/membresias', function () {
    return view('membresias');
})->name('membresias.index');

// HISTORIAL DE VENTAS
Route::get('/historial', function () {
    return view('historialv');
})->name('historial.index');

// CORTE DE CAJA
Route::get('/corte', function () {
    return view('corte');
})->name('corte.index');

// REPORTES
Route::get('/reportes', function () {
    return view('reportes');
})->name('reportes.index');

// LOGOUT (simulación de cierre de sesión)
Route::get('/logout', function () {
    return redirect('/login');
})->name('logout');

