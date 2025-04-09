<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id';

    // Se habilita la asignación masiva para estos campos.
    protected $fillable = [
        'nombre', 
        'email', 
        'telefono', 
        'direccion', 
        'fecha_ultimo_abastecimiento', 
        'fecha_creacion'
    ];

    // Si las fechas se manejan como instancias de Carbon, puedes declararlas
    protected $dates = [
        'fecha_ultimo_abastecimiento', 
        'fecha_creacion'
    ];

    public $timestamps = false;
}