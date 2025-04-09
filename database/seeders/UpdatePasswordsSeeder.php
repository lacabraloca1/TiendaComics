<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Empleado;

class UpdatePasswordsSeeder extends Seeder
{
    public function run()
    {
        $empleados = Empleado::all();
        
        foreach($empleados as $empleado) {
            $empleado->password = Hash::make($empleado->password);
            $empleado->save();
        }
    }
}