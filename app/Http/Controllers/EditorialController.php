<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EditorialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:60|unique:editorial'
        ]);

        Editorial::create([
            'nombre' => $validated['nombre'],
            'fecha_creacion' => Carbon::now(),
            'fecha_actualizacion' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Editorial creada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:60|unique:editorial,nombre,'.$id
        ]);

        $editorial = Editorial::findOrFail($id);
        $editorial->update([
            'nombre' => $validated['nombre'],
            'fecha_actualizacion' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Editorial actualizada exitosamente');
    }

    public function destroy($id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->delete();

        return redirect()->back()->with('success', 'Editorial eliminada exitosamente');
    }
}