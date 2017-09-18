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
            'super-admin' => [],
            'admin' => [
                'manage-user',
                'manage-data',
                'manage-branch',
            ],
            'manager' => [],
            'user' => [
                'view-branch'
            ],
        ];

        // TODO: Set in .env
        $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@dusa.co.uk',
            'password' => bcrypt('password'),
        ]);

        foreach ($roles as $name => $permissions) {
            $role = Role::create(['name' => $name]);
            foreach ($permissions as $item) {
                $permission = Permission::create(['name' => $item]);
                $role->givePermissionTo($permission);
            }
        }

        $super_admin->assignRole('super-admin');
    }
}
