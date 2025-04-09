<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Actualiza la información del cliente (incluyendo el ID de membresía)
     * sin afectar otros campos como la contraseña.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre'        => 'required|string',
            'apellido'      => 'required|string',
            'correo'        => 'required|email',
            'telefono'      => 'required|string',
            'direccion'     => 'required|string',
            'membrecias_id' => 'required|integer',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($data);

        return redirect()->route('membresias.index')
                         ->with('success', 'Información actualizada correctamente');
    }
}