<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create permissions
        Permission::firstOrCreate(['name' => 'edit-users']);
        Permission::firstOrCreate(['name' => 'delete-users']);
        Permission::firstOrCreate(['name' => 'update-users']);

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Assign permissions to admin role
        $adminRole->givePermissionTo(['edit-users', 'delete-users', 'update-users']);

        // Assign no special permissions to user role (default permissions)
    }
}
