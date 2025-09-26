<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        $owners = User::where('role', 'owner')->get();
        if ($owners->isEmpty()) {
            return;
        }

        for ($i = 1; $i <= 100; $i++) {
            $owner = $owners[($i - 1) % $owners->count()];
            Tenant::firstOrCreate(
                [
                    'email' => sprintf('tenant%03d@example.com', $i),
                ],
                [
                    'name' => sprintf('Tenant %03d', $i),
                    'contact' => sprintf('019%08d', $i),
                    'house_owner_id' => $owner->id,
                ]
            );
        }
    }
}


