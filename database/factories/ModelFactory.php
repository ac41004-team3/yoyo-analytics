<?php

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
        'id' => 'dusa-' . $faker->randomNumber(4)
    ];
});

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

$factory->define(App\Transaction::class, function (Faker $faker) {
    $type = $faker->randomElement([
        'discounted payment',
        'payment',
        'redemption',
        'reversal',
    ]);

    $spent = $faker->randomNumber(4);
    $discount = 0;
    if($type == 'discounted payment') {
        $discount = $faker->randomNumber(4);
    }

    return [
        'outlet_id' => function() {
            return factory(App\Outlet::class)->create()->id;
        },
        'customer_id' => function() {
            return factory(App\Customer::class)->create()->id;
        },
        'type' => $type,
        'spent' => $spent,
        'discount' => $discount,
        'total' => $spent + $discount,
    ];
});
