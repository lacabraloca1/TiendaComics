<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;        // Asegúrate de tener este modelo para acceder a las ventas
use App\Models\CorteCaja;    // Crea este modelo para la tabla corte_caja
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CorteCajaController extends Controller
{
    /**
     * Muestra la vista de corte con el historial de cortes y el total de ventas del día.
     */
    public function index()
    {
        // Obtener el total de ventas del día
        $totalVentas = Venta::whereDate('fecha_creacion', Carbon::today())->sum('total');
        
        // Obtener todos los cortes de caja
        $cortes = CorteCaja::with('empleado')->orderBy('fecha_creacion', 'desc')->get();
        
        return view('corte', compact('cortes', 'totalVentas'));
    }

    /**
     * Registra un nuevo corte en la caja usando los datos ingresados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'dinero_caja' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        // Obtener el total de ventas del día hasta el momento
        $totalVentas = Venta::whereDate('fecha_creacion', Carbon::today())->sum('total');

        $corteCaja = CorteCaja::create([
            'total_inicial' => $totalVentas, // Agregamos el total_inicial
            'dinero_caja' => $validated['dinero_caja'],
            'descripcion' => $validated['descripcion'],
            'fecha_creacion' => now(),
            'Empleado_id' => Auth::id(),
            'Ventas_id_pedido' => 0
        ]);

        return redirect()->route('corte.index')
                        ->with('success', 'Corte de caja registrado correctamente');
    }
}