<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    
    public $timestamps = false;
    
    protected $fillable = [
        'total',
        'Metodo_pagos_id',
        'Empleado_id',
        'pago_con',
        'cliente_id',
        'estado'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'Empleado_id');
    }

    public function detallespedidos()
    {
        return $this->hasMany(DetallePedido::class, 'ventas_id');
    }
}