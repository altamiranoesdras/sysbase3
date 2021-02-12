<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Option::class,1)->create([
            'nombre' => 'Admin',
            'icono_l' => 'fa-tools',
            'ruta' => '',
            'orden' => 2,
            'color' => 'bg-warning',
        ])->each(function (Option $option){
            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => 'Usuarios',
                'icono_l' => 'fa-users',
                'ruta' => 'users.index',
                'orden' => 2,
                'color' => 'bg-orange',
            ]);


            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => 'Menu',
                'icono_l' => 'fa-list',
                'ruta' => 'options.index',
                'orden' => 2,
                'color' => 'bg-teal',
            ]);
            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => "Prueba API'S",
                'icono_l' => 'fa-check-circle',
                'ruta' => 'developer.prueba.api',
                'orden' => 3,
                'color' => 'bg-orange',
            ]);

            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => "Roles",
                'icono_l' => 'fa-user-tag',
                'ruta' => 'roles.index',
                'orden' => 4,
                'color' => 'bg-info',
            ]);

            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => "Permisos",
                'icono_l' => 'fa-key',
                'ruta' => 'permissions.index',
                'orden' => 5,
                'color' => 'bg-purple',
            ]);

            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => "Configuraciones",
                'icono_l' => 'fa-cogs',
                'ruta' => 'configurations.index',
                'orden' => 6,
                'color' => 'bg-teal',
            ]);

            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => "Clientes Passport",
                'icono_l' => 'fa-passport',
                'ruta' => 'passport.clients',
                'orden' => 7,
                'color' => 'bg-teal',
            ]);
        });

        factory(Option::class,1)->create([
            'nombre' => "Dashboard",
            'icono_l' => 'fa-chart-line',
            'ruta' => 'dashboard',
            'orden' => 1,
            'color' => 'bg-warning',
        ]);

        factory(Option::class,1)->create([
            'nombre' => "Proyectos",
            'icono_l' => 'fa-project-diagram',
            'ruta' => '',
            'orden' => 3,
            'color' => 'bg-success',
        ])->each(function (Option $option){
            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => "Listado",
                'icono_l' => 'fa-list',
                'ruta' => 'projects.index',
                'orden' => 1,
                'color' => 'bg-warning',
            ]);
            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => "Nuevo",
                'icono_l' => 'fa-plus-circle',
                'ruta' => 'projects.create',
                'orden' => 1,
                'color' => 'bg-success',
            ]);
        });


        if (app()->environment()=='local'){

//            factory(Option::class,2)->create(['ruta' => null])->each(function (Option $option){
//                factory(Option::class,3)->create(['ruta' => null,'option_id' => $option->id])->each(function (Option $option){
//                    factory(Option::class,3)->create(['option_id' => $option->id])->each(function (Option $option){
////                        factory(Option::class,3)->create(['option_id' => $option->id]);
//                    });
//                });
//            });

        }

    }
}
