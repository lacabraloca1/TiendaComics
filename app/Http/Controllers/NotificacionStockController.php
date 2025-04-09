<?php
// filepath: c:\Users\100097567\Desktop\TiendaComics\app\Http\Controllers\NotificacionStockController.php
namespace App\Http\Controllers;

use App\Models\NotificacionStock;
use Illuminate\Http\Request;

class NotificacionStockController extends Controller
{
    // Muestra solo notificaciones pendientes (status = 0)
    public function index()
    {
        $notificaciones = NotificacionStock::where('status', 0)->get();
        return view('notificaciones', compact('notificaciones'));
    }

    // Marca una notificación como vista: cambia status a 1 y asigna la fecha_hora_visualizacion
    public function markAsSeen(Request $request, $id)
    {
        $notificacion = NotificacionStock::findOrFail($id);
        $notificacion->status = 1;
        $notificacion->fecha_hora_visualizacion = now()->toDateTimeString();
        $notificacion->save();

        return redirect()->route('notificaciones.index');
    }
}