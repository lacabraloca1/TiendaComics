<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\NotificacionStockController;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Membrecias;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CorteCajaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EditorialController;

// RUTA PRINCIPAL
Route::get('/', function () {
    return Auth::check() ? redirect()->route('caja.index') : redirect()->route('login');
});

// Rutas de autenticación
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

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
Route::get('/empleados', [EmpleadoController::class, 'index'])
    ->name('empleados.index');

// ENVÍOS
Route::get('/envios', function () {
    return view('envios');
})->name('envios.index');

// MEMBRESÍAS
Route::get('/membresias', function () {
    $clientes = Cliente::with('membrecias')->get();
    $membrecias = Membrecias::all();
    return view('membresias', compact('clientes', 'membrecias'));
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

Route::get('/modificarcli', function () {
    return view('modificarcli');
});

Route::get('/notificaciones', function () {
    return view('notificaciones');
})->name('notificaciones.index');

Route::get('/planes', function () {
    return view('planes');
});

// Ruta para la vista del carrito
Route::get('/carrito', function () {
    return view('carrito');
});

// Añade aquí más rutas para otras vistas
Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/perfil', function () {
    return view('perfil');
});

// Rutas para registro
Route::middleware('guest')->group(function () {
    Route::get('/registro', [RegistrationController::class, 'create'])
        ->name('register.form');
    Route::post('/registro', [RegistrationController::class, 'store'])
        ->name('register');
});

// Ruta para búsqueda de productos
Route::get('/productos/search', [ProductoController::class, 'search'])
    ->name('productos.search');

Route::post('/productos/{id}/update-stock', [ProductoController::class, 'updateStock'])
    ->name('productos.updateStock');

Route::post('/ventas/confirm', [VentaController::class, 'store'])
    ->name('ventas.store');
    
Route::get('/proveedores', [ProveedorController::class, 'index'])
    ->name('proveedores.index');
Route::post('/proveedores', [ProveedorController::class, 'store'])
    ->name('proveedores.store');
Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])
    ->name('proveedores.update');
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])
    ->name('proveedores.destroy');
Route::get('/notificaciones', [NotificacionStockController::class, 'index'])
    ->name('notificaciones.index');
Route::put('/notificaciones/{id}', [NotificacionStockController::class, 'markAsSeen'])
    ->name('notificaciones.markAsSeen');

Route::get('/historial', [VentaController::class, 'index'])
    ->name('historial.index');

Route::post('/ventas/devolucion', [VentaController::class, 'devolucion'])
    ->name('ventas.devolucion');
Route::post('/empleados', [EmpleadoController::class, 'store'])
    ->name('empleados.store');
Route::put('/empleados/{id}', [EmpleadoController::class, 'update'])
    ->name('empleados.update');
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy'])
    ->name('empleados.destroy');
Route::put('/empleados/{id}/password', [EmpleadoController::class, 'updatePassword'])
    ->name('empleados.updatePassword');

Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

Route::post('/corte', [CorteCajaController::class, 'store'])->name('corte.store');
Route::get('/corte', [CorteCajaController::class, 'index'])->name('corte.index');

Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/inventario', function () {
    $productos = \App\Models\Producto::all();
    $categorias = \App\Models\Categoria::all();
    $editoriales = \App\Models\Editorial::all();
    $proveedores = \App\Models\Proveedor::all();
    
    return view('inventario', compact('productos', 'categorias', 'editoriales', 'proveedores'));
})->name('inventario.index');

Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// Rutas para categorías
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

// Rutas para editoriales
Route::post('/editoriales', [EditorialController::class, 'store'])->name('editoriales.store');
Route::put('/editoriales/{id}', [EditorialController::class, 'update'])->name('editoriales.update');
Route::delete('/editoriales/{id}', [EditorialController::class, 'destroy'])->name('editoriales.destroy');