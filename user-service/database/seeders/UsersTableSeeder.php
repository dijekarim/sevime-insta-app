<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create a user user
        User::create([
            'name' => 'User One',
            'email' => 'user1@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create an User user
        User::create([
            'name' => 'User Two',
            'email' => 'user2@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
