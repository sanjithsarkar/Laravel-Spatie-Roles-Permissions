<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        // Create admin role
        $adminRole = Role::create(['name' => 'Admin']);

        // Retrieve all permissions and assign them to the admin role
        $permissions = Permission::pluck('id')->all();
        $adminRole->syncPermissions($permissions);

        // Assign admin role to the admin user
        $admin->assignRole($adminRole);
    }
}
