<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Issue;
use Faker\Generator as Faker;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'Name' => $faker->sentence(),
        'Desc' => $faker->paragraph(),
        'types_id' => $faker->numberBetween(1,5),
        'status_id' => $faker->numberBetween(1,2),
        'priority_id' => $faker->numberBetween(1,3)
    ];
});
