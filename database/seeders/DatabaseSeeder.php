<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Flat;
use App\Models\BillCategory;
use App\Models\Bill;
use App\Models\Tenant;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );

        // Create two owners with building info on users table
        $owner1 = User::firstOrCreate(
            ['email' => 'owner1@example.com'],
            [
                'name' => 'Owner One',
                'password' => Hash::make('password'),
                'role' => 'owner',
                'building_name' => 'Sunset Residency',
                'building_address' => '123 Sunset Blvd, Metro City',
            ]
        );
        $owner2 = User::firstOrCreate(
            ['email' => 'owner2@example.com'],
            [
                'name' => 'Owner Two',
                'password' => Hash::make('password'),
                'role' => 'owner',
                'building_name' => 'Lakeside Apartments',
                'building_address' => '45 Lake View Rd, Rivertown',
            ]
        );

        // Flats for each building
        $f1 = Flat::firstOrCreate([
            'house_owner_id' => $owner1->id,
            'flat_number' => 'A-101',
        ]);
        $f2 = Flat::firstOrCreate([
            'house_owner_id' => $owner1->id,
            'flat_number' => 'A-102',
        ]);
        $f3 = Flat::firstOrCreate([
            'house_owner_id' => $owner2->id,
            'flat_number' => 'B-201',
        ]);

        // Bill categories per owner
        $c1_elec = BillCategory::firstOrCreate(['house_owner_id' => $owner1->id, 'name' => 'Electricity']);
        $c1_gas = BillCategory::firstOrCreate(['house_owner_id' => $owner1->id, 'name' => 'Gas bill']);
        $c1_water = BillCategory::firstOrCreate(['house_owner_id' => $owner1->id, 'name' => 'Water bill']);
        $c1_util = BillCategory::firstOrCreate(['house_owner_id' => $owner1->id, 'name' => 'Utility Charges']);

        $c2_elec = BillCategory::firstOrCreate(['house_owner_id' => $owner2->id, 'name' => 'Electricity']);
        $c2_water = BillCategory::firstOrCreate(['house_owner_id' => $owner2->id, 'name' => 'Water bill']);

        // Tenants assigned by admin to owners (no building linkage)
        $t1 = Tenant::firstOrCreate([
            'name' => 'Alice Tenant',
            'email' => 'alice@example.com',
            'house_owner_id' => $owner1->id,
        ], [
            'contact' => '01900000001',
        ]);
        $t2 = Tenant::firstOrCreate([
            'name' => 'Bob Tenant',
            'email' => 'bob@example.com',
            'house_owner_id' => $owner2->id,
        ], [
            'contact' => '01900000002',
        ]);

        // Bills with due carry-forward logic example
        Bill::firstOrCreate([
            'flat_id' => $f1->id,
            'bill_category_id' => $c1_elec->id,
            'house_owner_id' => $owner1->id,
            'month' => '2025-08',
        ], [
            'amount' => 75.00,
            'status' => 'unpaid',
        ]);

        // New bill carrying forward previous unpaid
        Bill::firstOrCreate([
            'flat_id' => $f1->id,
            'bill_category_id' => $c1_elec->id,
            'house_owner_id' => $owner1->id,
            'month' => '2025-09',
        ], [
            'amount' => 80.00,
            'status' => 'unpaid',
        ]);
    }
}
