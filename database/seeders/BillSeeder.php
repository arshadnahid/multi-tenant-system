<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Flat;
use App\Models\BillCategory;
use App\Models\Bill;

class BillSeeder extends Seeder
{
    public function run(): void
    {
        $flats = Flat::with('owner')->get();

        foreach ($flats as $flat) {
            $ownerId = $flat->house_owner_id;
            $categories = BillCategory::where('house_owner_id', $ownerId)->pluck('id')->all();
            if (empty($categories)) {
                // If no categories exist for this owner, skip to avoid FK errors
                continue;
            }

            // Create bills for the last 20 months, first 10 as paid, next 10 as unpaid
            for ($i = 0; $i < 20; $i++) {
                $month = Carbon::now()->subMonths(19 - $i)->format('Y-m');
                $categoryId = $categories[$i % count($categories)];
                $status = $i < 10 ? 'paid' : 'unpaid';
                $baseAmount = 50 + ($i % 10) * 5; // deterministic but varied
                // Ensure totals differ between paid and unpaid by offsetting unpaid amounts
                $amount = $status === 'unpaid' ? $baseAmount + 3 : $baseAmount;

                Bill::firstOrCreate(
                    [
                        'flat_id' => $flat->id,
                        'bill_category_id' => $categoryId,
                        'house_owner_id' => $ownerId,
                        'month' => $month,
                    ],
                    [
                        'amount' => $amount,
                        'status' => $status,
                        'notes' => null,
                    ]
                );
            }
        }
    }
}


