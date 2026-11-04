<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@test.com',
            ],
            [
                'name' => 'Test Admin',
                'password' => Hash::make('abc123'),
            ]
        );

        User::updateOrCreate(
            [
                'email' => 'admin2@test.com',
            ],
            [
                'name' => 'Second Admin',
                'password' => Hash::make('abc123'),
            ]
        );
    }
}
