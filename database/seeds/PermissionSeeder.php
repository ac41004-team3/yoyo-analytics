<?php

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
            'admin' => [
                'manage-users',
                'manage-data',
                'manage-branches',
            ],
            'manager' => [
                'manage-assigned-branches',
            ],
            'user' => [
                'view-assigned-branches',
            ],
        ];

        // TODO: Set in .env
        $admin = User::updateOrCreate(['id' => 1], [
            'name' => 'Admin',
            'email' => 'admin@dusa.co.uk',
            'password' => bcrypt('password'),
        ]);

        foreach ($roles as $name => $permissions) {
            $role = Role::updateOrCreate(['name' => $name]);
            foreach ($permissions as $item) {
                $permission = Permission::updateOrCreate(['name' => $item]);
                $role->givePermissionTo($permission);
            }
        }

        $admin->assignRole('admin');
    }
}
