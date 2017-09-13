<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    $type = $faker->randomElement([
        'discounted payment',
        'payment',
        'redemption',
        'reversal',
    ]);

    $spent = $faker->randomNumber(4);
    if($type == 'discounted payment') {
        $discount = $faker->randomNumber(3);
    }

    return [
        'outlet_id' => Outlet::random(1)->id,
        'customer_id' => Customer::random(1)->id,
        'type' => $type,
        'spent' => $spent,
        'discount' => $discount,
        'total' => $spent + $discount,
    ];
});
