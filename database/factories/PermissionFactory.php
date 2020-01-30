<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->word,
        'guard_name' => $faker->randomElement(['web']),
    ];
});
