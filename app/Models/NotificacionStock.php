<?php
// filepath: c:\Users\100097567\Desktop\TiendaComics\app\Models\NotificacionStock.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotificacionStock extends Model
{
    protected $table = 'notificacionstock';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion', 
        'fecha_creacion', 
        'status', 
        'empleado_id', 
        'fecha_hora_visualizacion'
    ];
}