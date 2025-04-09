<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ActualizarPasswordsEmpleadosSeeder extends Seeder
{
    public function run()
    {
        $empleados = DB::table('empleado')->get();
        
        foreach($empleados as $empleado) {
            DB::table('empleado')
                ->where('id', $empleado->id)
                ->update([
                    'password' => Hash::make($empleado->password)
                ]);
        }
    }
}