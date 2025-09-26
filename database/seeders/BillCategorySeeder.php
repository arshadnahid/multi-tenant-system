<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BillCategory;

class BillCategorySeeder extends Seeder
{
    public function run(): void
    {
        $owners = User::where('role', 'owner')->get();
        $categories = [
            'Electricity',
            'Gas bill',
            'Water bill',
            'Utility Charges',
        ];

        foreach ($owners as $owner) {
            foreach ($categories as $name) {
                BillCategory::firstOrCreate([
                    'house_owner_id' => $owner->id,
                    'name' => $name,
                ]);
            }
        }
    }
}


