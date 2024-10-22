<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles
        $roles = ['user', 'admin', 'super_admin'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        // Create user
        User::create([
            'name' => 'Shahd',
            'email' => 'shahd1@gmail.com',
            'password' => Hash::make('Shahd@123'),
            'role_id' => Role::where('name', 'super_admin')->first()->id,
            'is_admin' => 1,
        ]);
    }
}
