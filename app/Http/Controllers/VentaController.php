<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DetallePedido;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    // Método que muestra el historial en la vista (index)
    public function index(Request $request)
    {
        // Aquí podrías aplicar filtros según request (si los usas)
        $ventas = Venta::all();
        return view('historialv', compact('ventas'));
    }

    // Método para la API que retorna las ventas en JSON
    public function apiIndex(Request $request)
    {
        $query = Venta::with('detallespedidos');

        if ($request->filled('folio')) {
            $query->where('id', 'like', '%' . $request->folio . '%');
        }
        if ($request->filled('fecha')) {
            $query->whereDate('fecha_creacion', $request->fecha);
        }
        if ($request->filled('total')) {
            $query->where('total', $request->total);
        }
        if ($request->filled('hora')) {
            $query->whereTime('fecha_creacion', $request->hora);
        }
        if ($request->filled('orden')) {
            $query->orderBy('fecha_creacion', $request->orden);
        }

        $ventas = $query->get();
        return response()->json($ventas);
    }

    // API para obtener una venta con su detalle
    public function apiShow($id)
    {
        $venta = Venta::with('detallespedidos.producto')->findOrFail($id);
        return response()->json($venta);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'orderDetails'    => 'required|array',
            'total'           => 'required|numeric',
            'Metodo_pagos_id' => 'required|integer',
            'pago_con'        => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $venta = Venta::create([
                'total'           => $data['total'],
                'Metodo_pagos_id' => $data['Metodo_pagos_id'],
                'Empleado_id'     => auth()->user()->id,
                'pago_con'        => $data['pago_con'],
                'estado'          => 'pagada'
            ]);

            foreach ($data['orderDetails'] as $item) {
                DetallePedido::create([
                    'id_producto' => $item['id'],
                    'cantidad'    => $item['quantity'],
                    'ventas_id'   => $venta->id,
                    'estado'      => 'vendido'
                ]);
            }

            DB::commit();
            return response()->json(['venta_id' => $venta->id, 'message' => 'Venta confirmada'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
    
    // (Opcional) Método para obtener los detalles de una venta vía AJAX
    public function detalles($id)
    {
        $venta = Venta::with('detallespedidos')->findOrFail($id);
        return response()->json($venta);
    }

    public function devolucion(Request $request)
    {
        $data = $request->validate([
            'detalle_id'  => 'required|integer',
            'producto_id' => 'required|integer',
            'cantidad'    => 'required|integer|min:1'
        ]);

        // Busca el detalle para verificar su estado
        $detalle = DetallePedido::findOrFail($data['detalle_id']);

        // Si ya fue devuelto, se retorna un error
        if ($detalle->estado === 'devuelta') {
            return response()->json(['error' => 'Este artículo ya fue devuelto'], 422);
        }

        // Actualiza el estado del detalle a "devuelta"
        $detalle->estado = 'devuelta';
        $detalle->save();

        // Actualiza el stock del producto retornado
        $producto = Producto::findOrFail($data['producto_id']);
        $producto->increment('stock_actual', $data['cantidad']);

        // Recalcula el total de la venta: suma de (cantidad * precio) para cada detalle NO devuelto
        $venta = Venta::findOrFail($detalle->ventas_id);
        $newTotal = 0;
        // Cargamos los detalles
        $venta->load('detallespedidos');
        foreach ($venta->detallespedidos as $dp) {
            if ($dp->estado !== 'devuelta') {
                // Se asume que cada detalle tiene asociado el producto (puedes optimizar obteniendo la relación)
                $prod = Producto::findOrFail($dp->id_producto);
                $newTotal += $dp->cantidad * $prod->precio;
            }
        }
        $venta->total = $newTotal;
        // (Opcional) Actualiza el estado de la venta según convenga
        $venta->estado = $newTotal == 0 ? 'cancelada' : 'parcial';
        $venta->save();

        return response()->json([
            'success'   => true,
            'message'   => 'Artículo devuelto. Stock actualizado y total de venta recalculado.',
            'new_total' => $newTotal
        ]);
    }
}