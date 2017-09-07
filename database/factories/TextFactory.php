<?php

use Faker\Generator as Faker;

$factory->define(App\Text::class, function (Faker $faker) {
    return [
        'content' => $faker->paragraph,
        'delay' => $faker->numberBetween(0, 3000),
        'speed' => $faker->numberBetween(0, 1000),
    ];
});
