<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Flat;

class FlatSeeder extends Seeder
{
    public function run(): void
    {
        // For each owner, create 10 flats with number like owner-name-flat-01
        $owners = User::where('role', 'owner')->get();

        foreach ($owners as $owner) {
            $ownerSlug = strtolower(str_replace([' ', '_'], '-', $owner->name));
            for ($i = 1; $i <= 10; $i++) {
                $flatNumber = sprintf('%s-flat-%02d', $ownerSlug, $i);
                Flat::firstOrCreate(
                    [
                        'house_owner_id' => $owner->id,
                        'flat_number' => $flatNumber,
                    ],
                    []
                );
            }
        }
    }
}


