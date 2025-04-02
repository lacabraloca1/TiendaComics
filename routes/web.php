<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inventario', function () {
    return view('inventario');
});

Route::get('/caja', function () {
    return view('caja');
});

Route::get('/historialv', function () {
    return view('historialv');
});

Route::get('/proveedores', function () {
    return view('proveedores');
});

Route::get('/envios', function () {
    return view('envios');
});

Route::get('/pedidos', function () {
    return view('pedidos');
});

Route::get('/reportes', function () {
    return view('reportes');
});

Route::get('/modificarcli', function () {
    return view('modificarcli');
});

Route::get('/membresias', function () {
    return view('membresias');
});

Route::get('/planes', function () {
    return view('planes');
});

Route::get('/login', function () {
    return view('login');
});



Route::get('/home', function () {
    return view('home');
});

Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/producto', function () {
    return view('producto');
});

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/confirmacion', function () {
    return view('confirmacion');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/editar_perfil', function () {
    return view('editar_perfil');
});

Route::get('/mis_pedidos', function () {
    return view('mis_pedidos');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/carrito', function () {
    return view('carrito');
});