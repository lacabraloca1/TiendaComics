<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Membrecias;

class Cliente extends Model
{
    protected $primaryKey = 'id_cliente';
    
    public $incrementing = true;
    protected $keyType = 'int';

    // Indica a Eloquent los nombres de las columnas de timestamps
    public const CREATED_AT = 'fecha_registro';
    public const UPDATED_AT = 'fecha_actualizacion';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'direccion',
        'membrecias_id',
        'empleado_id',
        'fecha_actualizacion',
        'status',
        'password'
    ];

    public function membrecias()
    {
        return $this->belongsTo(Membrecias::class, 'membrecias_id');
    }
}