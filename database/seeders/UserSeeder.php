<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
            'status' => 1,
        ]);

        User::create([
            'name' => 'Staff',
            'username' => 'staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('123123'),
            'role' => 'staff',
            'status' => 2,
        ]);
    }
}
