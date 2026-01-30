<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'arizaalvaro238@gmail.com'],
            [
                'name' => 'alvaro',
                'password' => Hash::make('alvaro123'),
                'role' => 'admin',
            ]
        );
    }
}
