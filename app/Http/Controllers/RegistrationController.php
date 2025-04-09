<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function create()
    {
        return view('auth.register'); // Archivo: resources/views/auth/register.blade.php
    }

    /**
     * Procesa el registro de un nuevo empleado.
     */
    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $data = $request->validate([
            'nombre'         => 'required|string|max:255',
            'apellidoP'      => 'required|string|max:255',
            'apellidoM'      => 'required|string|max:255',
            'telefono'       => 'required|string|max:20',
            'correo'         => 'required|email|unique:empleado,correo',
            'direccion'      => 'required|string|max:500',
            'Roles_id'       => 'required|integer',
            'password'       => 'required|string|min:6|confirmed',
        ]);

        // Crea el empleado. El mutator del modelo se encargará de hashear la contraseña.
        $empleado = Empleado::create([
            'nombre'             => $data['nombre'],
            'apellidoP'          => $data['apellidoP'],
            'apellidoM'          => $data['apellidoM'],
            'telefono'           => $data['telefono'],
            'correo'             => $data['correo'],
            'fecha_registro'     => now(),
            'fecha_actualizacion'=> now(),
            'direccion'          => $data['direccion'],
            'Roles_id'           => $data['Roles_id'],
            'password'           => $data['password'],
        ]);

        // Autentica automáticamente al empleado registrado
        Auth::login($empleado);

        // Redirige a la ruta principal o dashboard con un mensaje de éxito
        return redirect()->route('caja.index');
    }
}
