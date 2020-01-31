<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Configuration;
use Faker\Generator as Faker;

$factory->define(Configuration::class, function (Faker $faker) {

    return [
        'key' => $faker->word,
        'value' => $faker->word,
        'descripcion' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
