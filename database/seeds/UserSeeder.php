<?php

use App\Outlet;
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
        factory(App\User::class, 100)->create()->each(function ($user) {
            $user->assignRole(Role::inRandomOrder()->first()->name);
            $user->outlets()->attach(array_random(Outlet::all()->pluck('id')->toArray(), random_int(0, 4)));
            //TODO:: associate user with outlet(s)
        });
    }
}
