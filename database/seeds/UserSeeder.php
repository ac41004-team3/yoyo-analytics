<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 500)->create()->each(function ($user) {
            $user->assignRole(Role::inRandomOrder()->first()->name);
            //TODO:: associate user with outlet(s)
        });
    }
}
