<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Option;
use Faker\Generator as Faker;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'option_id' => null,
        'nombre' => $faker->userName,
        'ruta' => $faker->word,
        'descripcion' => $faker->text,
        'icono_l' => $faker->randomElement([
             'fa-file-code',
             'fa-edit',
             'fa-phone',
             'fa-table',
             'fa-file-pdf',
             'fa-file-image',
             'fa-tablet',
             'fa-file-excel',
        ]),
        'icono_r' => null,
        'orden' => rand(0,10)
    ];
});
