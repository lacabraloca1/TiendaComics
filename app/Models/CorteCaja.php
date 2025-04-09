<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorteCaja extends Model
{
    // Definimos la tabla manualmente (opcional si el nombre es pluralizado)
    protected $table = 'corte_caja';
    
    // Clave primaria
    protected $primaryKey = 'id';
    
    // Tipo y si es incremental
    public $incrementing = true;
    protected $keyType = 'int';
    
    // Si la tabla no tiene created_at y updated_at
    public $timestamps = false;
    
    // Campos asignables
    protected $fillable = [
        'total_inicial',
        'dinero_caja',
        'descripcion',
        'fecha_creacion',
        'Ventas_id_pedido',
        'Empleado_id'
    ];
    
    // Relación con Empleado (asumiendo que el modelo Empleado existe)
    public function empleado()
    {
        return $this->belongsTo(\App\Models\Empleado::class, 'Empleado_id');
    }
}