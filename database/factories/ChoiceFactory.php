<?php

use Faker\Generator as Faker;

$factory->define(App\Choice::class, function (Faker $faker) {
    return [
        'text' => $faker->paragraph,
        'nextPage_id' => function() {
        	return factory(App\Page::class)->create()->id;
        }
    ];
});
