<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (Route::getRoutes() as $route){

            Permission::firstOrCreate(['name' => 'Ver configuración']);
            Permission::firstOrCreate(['name' => 'Editar configuración']);
            Permission::firstOrCreate(['name' => 'Eliminar configuración']);

            Permission::firstOrCreate(['name' => 'Ver opcion menu']);
            Permission::firstOrCreate(['name' => 'Editar opcion menu']);
            Permission::firstOrCreate(['name' => 'Eliminar opcion menu']);

            Permission::firstOrCreate(['name' => 'Ver permisos']);
            Permission::firstOrCreate(['name' => 'Editar permisos']);
            Permission::firstOrCreate(['name' => 'Eliminar permisos']);

            Permission::firstOrCreate(['name' => 'Ver roles']);
            Permission::firstOrCreate(['name' => 'Editar roles']);
            Permission::firstOrCreate(['name' => 'Eliminar roles']);

            Permission::firstOrCreate(['name' => 'Ver usuarios']);
            Permission::firstOrCreate(['name' => 'Editar usuarios']);
            Permission::firstOrCreate(['name' => 'Eliminar usuarios']);
        }

    }
}
