<?php

use App\Outlet;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super admin' => [
                'manage-users',
                'manage-data',
                'manage-branches',
            ],
            'admin' => [
                'manage-users',
                'manage-data',
                'manage-branches',
            ],
            'manager' => [
                'manage-assigned-branches',
                'manage-assigned-users',
            ],
            'user' => [
                'view-assigned-branches',
            ],
        ];

        // TODO: Set in .env
        $super_admin = User::updateOrCreate(['id' => 1], [
            'name' => 'Super Admin',
            'email' => 'superadmin@dusa.co.uk',
            'password' => bcrypt('password'),
        ]);


        $admin = User::updateOrCreate(['id' => 2], [
            'name' => 'Admin',
            'email' => 'admin@dusa.co.uk',
            'password' => bcrypt('password'),
        ]);


        $manager = User::updateOrCreate(['id' => 3], [
            'name' => 'Manager',
            'email' => 'manager@dusa.co.uk',
            'password' => bcrypt('password'),
        ]);


        $user = User::updateOrCreate(['id' => 4], [
            'name' => 'User',
            'email' => 'user@dusa.co.uk',
            'password' => bcrypt('password'),
        ]);

        foreach ($roles as $name => $permissions) {
            $role = Role::updateOrCreate(['name' => $name]);
            foreach ($permissions as $item) {
                $permission = Permission::updateOrCreate(['name' => $item]);
                $role->givePermissionTo($permission);
            }
        }

        $super_admin->assignRole('super admin');
        $admin->assignRole('admin');
        $manager->assignRole('manager');
        $user->assignRole('user');

        $super_admin->outlets()->sync(Outlet::all()->pluck('id')->toArray());
        $admin->outlets()->sync(array_random(Outlet::all()->pluck('id')->toArray()));
        $manager->outlets()->sync(array_random(Outlet::all()->pluck('id')->toArray(), random_int(1, 2)));
        $user->outlets()->sync(array_random(Outlet::all()->pluck('id')->toArray(), 1));
    }
}
