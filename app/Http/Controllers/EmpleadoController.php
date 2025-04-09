<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadoController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => 'required|string',
            'apellidoP' => 'required|string',
            'apellidoM' => 'required|string',
            'correo'    => 'required|email',
            'telefono'  => 'required|numeric',
            'direccion' => 'required|string',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        $empleado = new Empleado();
        $empleado->nombre     = $data['nombre'];
        $empleado->apellidoP  = $data['apellidoP'];
        $empleado->apellidoM  = $data['apellidoM'];
        $empleado->correo     = $data['correo'];
        $empleado->telefono   = $data['telefono'];
        $empleado->direccion  = $data['direccion'];
        // Asignamos el rol (puedes ajustar el valor según tu lógica, aquí se asigna por defecto 2)
        $empleado->Roles_id   = $request->input('Roles_id', 2);
        $empleado->password   = Hash::make($data['password']);
        $empleado->save();

        return redirect()->route('empleados.index');
    }

    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados', compact('empleados'));
    }

    public function update(Request $request, $id)
    {
        // Valida sólo los datos generales, sin contraseña
        $data = $request->validate([
            'nombre'      => 'required|string',
            'apellidoP'   => 'required|string',
            'apellidoM'   => 'required|string',
            'correo'      => 'required|email',
            'telefono'    => 'required',
            'direccion'   => 'required|string',
            'Roles_id'    => 'required|integer',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($data);

        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado correctamente');
    }

    public function updatePassword(Request $request, $id)
    {
        $data = $request->validate([
            'password' => 'required|string|confirmed|min:6',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->password = Hash::make($data['password']);
        $empleado->save();

        return redirect()->route('empleados.index')->with('success', 'Contraseña actualizada correctamente');
    }
}