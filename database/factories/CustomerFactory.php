<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'id' => 'dusa-' . $faker->randomNumber(4)
    ];
});

