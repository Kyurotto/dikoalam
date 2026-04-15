<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'Administrator - can manage products, view reports, and manage employees',
        ]);

        $employeeRole = Role::create([
            'name' => 'employee',
            'description' => 'Employee - can take orders and view menu',
        ]);

        $supplierRole = Role::create([
            'name' => 'supplier',
            'description' => 'Supplier - can view supply orders and deliveries',
        ]);

        // Make the first user an admin
        $firstUser = User::first();
        if ($firstUser) {
            $firstUser->role_id = $adminRole->id;
            $firstUser->save();
        }
    }
}
