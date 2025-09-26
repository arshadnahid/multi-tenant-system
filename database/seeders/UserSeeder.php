<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create 1 admin
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );

        // Create 9 owners
        for ($i = 1; $i <= 9; $i++) {
            User::firstOrCreate(
                ['email' => "owner{$i}@example.com"],
                [
					'name' => "Owner-{$i}",
                    'password' => Hash::make('12345678'),
                    'role' => 'owner',
					'building_name' => "Owner-{$i} Building",
					'building_address' => "123 Owner-{$i} Street, City",
                ]
            );
        }
    }
}


