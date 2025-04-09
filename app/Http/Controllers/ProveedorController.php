<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProveedorController extends Controller
{
    // Muestra la lista de proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores', compact('proveedores'));
    }

    // Almacena un nuevo proveedor en la BD
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => 'required|string|max:100',
            'email'     => 'required|email|max:100|unique:proveedores,email',
            'telefono'  => 'required|string|max:15',
            'direccion' => 'nullable|string|max:255',
        ]);

        $data['fecha_ultimo_abastecimiento'] = now();
        $data['fecha_creacion'] = now();

        Proveedor::create($data);

        return redirect()->route('proveedores.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email|max:100',
            'telefono' => 'required|string|max:15',
            'direccion'=> 'nullable|string|max:255'
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->only(['nombre', 'email', 'telefono', 'direccion']));

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy(Request $request, $id)
    {
        // Valida que se envíe el id del nuevo proveedor para reasignar los productos
        $data = $request->validate([
            'nuevo_proveedor_id' => 'required|exists:proveedores,id',
        ]);

        // Actualiza los productos que tengan este proveedor, asignándoles el nuevo proveedor
        Producto::where('proveedores_id', $id)
            ->update(['proveedores_id' => $data['nuevo_proveedor_id']]);

        // Elimina el proveedor
        Proveedor::destroy($id);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado y productos reasignados correctamente.');
    }
}