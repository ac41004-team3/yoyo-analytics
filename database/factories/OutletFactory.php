<?php

use Faker\Generator as Faker;

$factory->define(App\Outlet::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'air',
            'bar',
            'campus',
            'ents',
            'liar',
            'library',
            'mono',
            'remote',
            'shop',
            'spare',
        ])
    ];
});

