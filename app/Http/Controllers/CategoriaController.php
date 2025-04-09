<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:60|unique:categorias'
        ]);

        Categoria::create([
            'nombre' => $validated['nombre'],
            'fecha_creacion' => Carbon::now(),
            'fecha_actualizacion' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Categoría creada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:60|unique:categorias,nombre,'.$id
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'nombre' => $validated['nombre'],
            'fecha_actualizacion' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->back()->with('success', 'Categoría eliminada exitosamente');
    }
}