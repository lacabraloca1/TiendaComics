<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = false; // ya que usas fecha_registro y fecha_actualizacion

    protected $fillable = [
        'descripcion',
        'stock_actual',
        'imagen_url',
        'codigo_barras',
        'precio_proveedor',
        'precio',
        'fecha_registro',
        'fecha_actualizacion',
        'categorias_id',
        'editorial_id',
        'proveedores_id'
    ];

    protected $casts = [
        'codigo_barras' => 'string' // Importante: manejar como string para números grandes
    ];
}