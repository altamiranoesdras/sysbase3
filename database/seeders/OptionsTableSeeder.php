<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('options')->delete();

        \DB::table('options')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'option_id' => NULL,
                    'nombre' => 'Dashboard',
                    'ruta' => 'dashboard',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-chart-line',
                    'icono_r' => NULL,
                    'orden' => 0,
                    'color' => '',
                    'dev' => 0,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2020-08-26 11:51:32',
                    'deleted_at' => NULL,
                ),
            1 =>
                array (
                    'id' => 2,
                    'option_id' => NULL,
                    'nombre' => 'Admin',
                    'ruta' => '',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-tools',
                    'icono_r' => NULL,
                    'orden' => 15,
                    'color' => '',
                    'dev' => 0,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:01:22',
                    'deleted_at' => NULL,
                ),
            2 =>
                array (
                    'id' => 3,
                    'option_id' => 2,
                    'nombre' => 'Usuarios',
                    'ruta' => 'users.index',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-users',
                    'icono_r' => NULL,
                    'orden' => 0,
                    'color' => '',
                    'dev' => 0,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:19:48',
                    'deleted_at' => NULL,
                ),
            3 =>
                array (
                    'id' => 4,
                    'option_id' => 2,
                    'nombre' => 'Roles',
                    'ruta' => 'roles.index',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-user-tag',
                    'icono_r' => NULL,
                    'orden' => 2,
                    'color' => 'bg-info',
                    'dev' => 0,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:19:48',
                    'deleted_at' => NULL,
                ),
            4 =>
                array (
                    'id' => 5,
                    'option_id' => 2,
                    'nombre' => 'Permisos',
                    'ruta' => 'permissions.index',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-key',
                    'icono_r' => NULL,
                    'orden' => 3,
                    'color' => '',
                    'dev' => 0,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:19:48',
                    'deleted_at' => NULL,
                ),
            5 =>
                array (
                    'id' => 6,
                    'option_id' => 2,
                    'nombre' => 'Configuraciones',
                    'ruta' => 'profile.business',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-cogs',
                    'icono_r' => NULL,
                    'orden' => 4,
                    'color' => '',
                    'dev' => 0,
                    'created_at' => '2021-03-14 21:17:37',
                    'updated_at' => '2021-03-14 21:19:48',
                    'deleted_at' => NULL,
                ),
            6 =>
                array (
                    'id' => 7,
                    'option_id' => NULL,
                    'nombre' => 'Developer',
                    'ruta' => 'x',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-file-code',
                    'icono_r' => NULL,
                    'orden' => 25,
                    'color' => '',
                    'dev' => 1,
                    'created_at' => '2021-03-14 21:11:34',
                    'updated_at' => '2021-03-14 21:13:25',
                    'deleted_at' => NULL,
                ),
            7 =>
                array (
                    'id' => 8,
                    'option_id' => 7,
                    'nombre' => 'Prueba API\'S',
                    'ruta' => 'dev.prueba.api',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-check-circle',
                    'icono_r' => NULL,
                    'orden' => 21,
                    'color' => '',
                    'dev' => 1,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:16:13',
                    'deleted_at' => NULL,
                ),
            8 =>
                array (
                    'id' => 9,
                    'option_id' => 7,
                    'nombre' => 'Configuraciones',
                    'ruta' => 'dev.configurations.index',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-cogs',
                    'icono_r' => NULL,
                    'orden' => 20,
                    'color' => '',
                    'dev' => 1,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:15:59',
                    'deleted_at' => NULL,
                ),
            9 =>
                array (
                    'id' => 10,
                    'option_id' => 7,
                    'nombre' => 'Clientes Passport',
                    'ruta' => 'dev.passport.clients',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-passport',
                    'icono_r' => NULL,
                    'orden' => 22,
                    'color' => '',
                    'dev' => 1,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:16:22',
                    'deleted_at' => NULL,
                ),
            10 =>
                array (
                    'id' => 11,
                    'option_id' => 7,
                    'nombre' => 'Menu',
                    'ruta' => 'options.index',
                    'descripcion' => NULL,
                    'icono_l' => 'fa-list',
                    'icono_r' => NULL,
                    'orden' => 1,
                    'color' => '',
                    'dev' => 1,
                    'created_at' => '2020-08-26 11:46:42',
                    'updated_at' => '2021-03-14 21:19:48',
                    'deleted_at' => NULL,
                ),
        ));

        $this->genraColoresIcons();

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }

    public function genraColoresIcons()
    {

        foreach (Option::all() as $index => $item) {

            $colores = [
                'text-indigo',
                'text-lightblue',
                'text-navy',
                'text-purple',
                'text-fuchsia',
                'text-pink',
                'text-maroon',
                'text-orange',
                'text-lime',
                'text-teal',
                'text-olive',
            ];

            $item->color = array_random($colores);
            $item->save();
        }

    }
}
