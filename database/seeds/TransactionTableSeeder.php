<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Customer', 500)->create()->each(function($customer) {
            $customer->transactions()->save(factory('App\Transaction', rand(2, 15)));
        });
    }
}
