<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => 1, // Assuming admin role has an ID of 1 in the roles table
        ]);

        // Create a manager user
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'role_id' => 2, // Assuming manager role has an ID of 2 in the roles table
        ]);

        // Create a regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3, // Assuming regular role has an ID of 3 in the roles table
        ]);
    }
}
