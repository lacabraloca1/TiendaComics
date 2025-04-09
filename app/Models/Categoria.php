<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    
    protected $primaryKey = 'id';
    
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'fecha_creacion',
        'fecha_actualizacion'
    ];

    // Relación con productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categorias_id');
    }
}