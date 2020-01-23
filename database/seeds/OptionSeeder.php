<?php

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
            'ruta' => ''
        ])->each(function (Option $option){
            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => 'Usuarios',
                'icono_l' => 'fa-users',
                'ruta' => 'users'
            ]);


            factory(Option::class,1)->create([
                'option_id' => $option->id,
                'nombre' => 'Menu',
                'icono_l' => 'fa-list',
                'ruta' => 'menu'
            ]);
        });


        if (app()->environment()=='local'){

            factory(Option::class,2)->create(['ruta' => null])->each(function (Option $option){
                factory(Option::class,3)->create(['ruta' => null,'option_id' => $option->id])->each(function (Option $option){
                    factory(Option::class,3)->create(['option_id' => $option->id])->each(function (Option $option){
                        factory(Option::class,3)->create(['option_id' => $option->id]);
                    });
                });
            });

        }

    }
}
