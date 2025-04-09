<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $table = 'editorial';
    
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
        return $this->hasMany(Producto::class, 'editorial_id');
    }
}