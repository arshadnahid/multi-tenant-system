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
use Database\Seeders\UserSeeder;
use Database\Seeders\FlatSeeder;
use Database\Seeders\BillCategorySeeder;
use Database\Seeders\TenantSeeder;
use Database\Seeders\BillSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(FlatSeeder::class);
        $this->call(BillCategorySeeder::class);
        $this->call(TenantSeeder::class);
        $this->call(BillSeeder::class);

    }
}
