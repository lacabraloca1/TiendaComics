<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ActualizarPasswordsEmpleadosSeeder::class
        ]);

        DB::table('empleado')->where('correo', 'a@a.com')->update(['password' => Hash::make('angel820')]);
    }
}
