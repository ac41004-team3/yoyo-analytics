<?php

use App\Outlet;
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'id' => 'dusa-' . $faker->unique()->randomNumber(4),
    ];
});

$factory->define(App\Outlet::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'Outlet Name',
            'Library',
            'Spare',
            'Air Bar',
            'Ents',
            'Remote Campus Shop',
            'Liar Bar',
            'Mono',
            'Food on Four',
            'Floor Five',
            'DOJ Catering',
            'DJCAD Cantina',
            'Level 2, Reception',
            'DUSA The Union - Marketplace',
            'Premier Shop - Yoyo Accept',
            'Dental Café',
            'Online Dundee University Students Association',
            'DUSA The Union Online',
            'Premier Shop',
            'College Shop',
            'Ninewells Shop',
        ])
    ];
});

$factory->define(App\Transaction::class, function (Faker $faker) {
    $type = $faker->randomElement([
        'discounted payment',
        'payment',
        'redemption',
        'reversal',
    ]);

    $spent = $faker->randomNumber(4);
    $discount = 0;
    if ($type == 'discounted payment') {
        $discount = $faker->randomNumber(4);
    }

    return [
        'outlet_id' => Outlet::inRandomOrder()->first()->id,
        'customer_id' => Customer::inRandomOrder()->first()->id,
        'type' => $type,
        'spent' => $spent,
        'discount' => $discount,
        'total' => $spent + $discount,
    ];
});
