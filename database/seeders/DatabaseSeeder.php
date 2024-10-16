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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create([
            'name'=>'admin',
        ]);

        Role::create([
            'name'=>'user',
        ]);

        User::create([
            'name'=>'yasmin',
            'email' => 'yasmin@admin.com',
            'password'=>Hash::make('01470147'),
            'role_id'=> 1,
        ]);
    }
}
