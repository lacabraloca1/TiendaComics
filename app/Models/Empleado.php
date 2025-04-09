<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empleado extends Authenticatable
{
    use Notifiable;

    protected $table = 'empleado';
    protected $primaryKey = 'id';
    protected $hidden = ['password'];

    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'telefono',
        'correo',
        'fecha_registro',
        'fecha_actualizacion',
        'Roles_id',
        'direccion',
        'password'
    ];

    public $timestamps = false;

    // Sobrescribe el campo utilizado para la autenticación
    public function username()
    {
        return 'correo';
    }

    // Mutator para hashear la contraseña
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            if (!isset($this->attributes['password']) || $value !== $this->attributes['password']) {
                $this->attributes['password'] = bcrypt($value);
            }
        }
    }
}
