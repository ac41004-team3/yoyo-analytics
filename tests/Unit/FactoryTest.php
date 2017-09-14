<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactoryTest extends TestCase
{
    public function test_creates_at_least_hundred_users()
    {
        $users = factory('App\User', rand(100, 1000))->create();

        $this->assertTrue(count($users) >= 100);
    }

    public function test_creates_at_least_hundred_customers()
    {
        $customers = factory('App\Customer', rand(100, 1000))->create();

        $this->assertTrue(count($customers) >= 100);
    }

    public function test_creates_all_outlets()
    {
        $outlets = factory('App\Outlet', 21)->create();

        $this->assertTrue(count($outlets) == 21);
    }

    public function test_creates_at_least_hundred_transactions()
    {
        factory('App\Outlet', 21)->create();
        $transactions = factory('App\Transaction', rand(100, 1000))->create();

        $this->assertTrue(count($transactions) >= 100);
    }
}
