<?php

use Faker\Generator as Faker;

$factory->define(App\Read::class, function (Faker $faker) {
    return [
        'choice_id' => function() {
            return factory(App\Choice::class)->create()->id;
        },
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        }
    ];
});
