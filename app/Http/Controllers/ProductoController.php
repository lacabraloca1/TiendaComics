<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function search(Request $request)
    {
        $query = trim($request->query('query', ''));
        if ($query === '') {
            $productos = Producto::all();
        } else {
            $productos = Producto::where('descripcion', 'like', "%{$query}%")
                ->orWhere('codigo_barras', 'like', "%{$query}%")
                ->orWhere('id_producto', 'like', "%{$query}%")
                ->get();
        }
        return response()->json($productos);
    }

    // Rebaja el stock de un producto al "agregar"
    public function updateStock(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $producto = Producto::findOrFail($id);

        if ($producto->stock_actual < $request->quantity) {
            return response()->json(['error' => 'Stock insuficiente'], 422);
        }

        $producto->stock_actual -= $request->quantity;
        $producto->fecha_actualizacion = now();
        $producto->save();

        return response()->json($producto);
    }

    // Método para crear un producto (ya existente)
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'descripcion' => 'required|string|max:255',
                'stock_actual' => 'required|integer|min:0',
                'imagen_url' => 'nullable|image|max:2048',
                'codigo_barras' => 'nullable|string|max:13',
                'precio_proveedor' => 'required|numeric|min:0',
                'precio' => 'required|numeric|min:0',
                'categorias_id' => 'required|exists:categorias,id',
                'editorial_id' => 'required|exists:editorial,id',
                'proveedores_id' => 'required|exists:proveedores,id'
            ]);

            $producto = Producto::create([
                ...$validated,
                'fecha_registro' => now(),
                'fecha_actualizacion' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Producto creado exitosamente',
                'producto' => $producto
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }

    // Método para actualizar un producto
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'stock_actual' => 'required|integer|min:0',
            'imagen_url' => 'nullable|image|max:2048',
            'codigo_barras' => 'nullable|string|max:13', // Cambiar a string
            'precio_proveedor' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0',
            'categorias_id' => 'required|exists:categorias,id',
            'editorial_id' => 'required|exists:editorial,id',
            'proveedores_id' => 'required|exists:proveedores,id'
        ]);

        $producto = Producto::findOrFail($id);

        // Manejar el código de barras
        if ($request->has('codigo_barras')) {
            $validated['codigo_barras'] = $request->codigo_barras;
        }

        // Manejar la imagen si se subió una nueva
        if ($request->hasFile('imagen_url')) {
            if ($producto->imagen_url) {
                Storage::disk('public')->delete($producto->imagen_url);
            }
            $path = $request->file('imagen_url')->store('productos', 'public');
            $validated['imagen_url'] = $path;
        }

        $producto->update([
            ...$validated,
            'fecha_actualizacion' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Producto actualizado correctamente',
            'producto' => $producto
        ]);
    }

    // Método para eliminar un producto
    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            
            // Si el producto tiene una imagen, eliminarla del almacenamiento
            if ($producto->imagen_url) {
                Storage::disk('public')->delete($producto->imagen_url);
            }
            
            $producto->delete();

            return response()->json([
                'success' => true,
                'message' => 'Producto eliminado correctamente'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el producto: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            return response()->json($producto);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al cargar el producto: ' . $e->getMessage()
            ], 404);
        }
    }
}