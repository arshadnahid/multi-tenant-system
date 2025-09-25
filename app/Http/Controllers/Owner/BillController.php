<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillCategory;
use App\Models\Flat;
use App\Notifications\BillCreated;
use App\Notifications\BillPaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $ownerId = $request->user()->id;
        $data=array();
        $data['title'] = get_phrase('Make Bill');
        $data['module'] = get_phrase('Owner');
        $data['bill_categories']= BillCategory::where('house_owner_id', $ownerId)->get();
        $data['falts']= Flat::where('house_owner_id', $ownerId)->get();
        return view('backend.pages.bill.index', $data);
    }

    public function store(Request $request)
    {
        $ownerId = $request->user()->id;
        $data = $request->validate([
            'flat_id' => 'required|exists:flats,id',
            'bill_category_id' => 'required|exists:bill_categories,id',
            'month' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $flat = Flat::where('id', $data['flat_id'])->where('house_owner_id', $ownerId)->firstOrFail();
        $category = BillCategory::where('id', $data['bill_category_id'])->where('house_owner_id', $ownerId)->firstOrFail();

        $previousUnpaid = Bill::where('flat_id', $flat->id)
            ->where('house_owner_id', $ownerId)
            ->where('status', 'unpaid')
            ->sum('amount');

        $bill = Bill::create([
            'flat_id' => $flat->id,
            'bill_category_id' => $category->id,
            'house_owner_id' => $ownerId,
            'month' => $data['month'],
            'amount' => $data['amount'],
            'due_carried_forward' => $previousUnpaid,
            'notes' => $data['notes'] ?? null,
        ]);

        Notification::route('mail', $request->user()->email)->notify(new BillCreated($bill));
        return response()->json($bill->load(['flat', 'category']), 201);
    }

    public function markPaid(Request $request, Bill $bill)
    {
        abort_unless($bill->house_owner_id === $request->user()->id, 403);
        $bill->update(['status' => 'paid']);
        Notification::route('mail', $request->user()->email)->notify(new BillPaid($bill));
        return $bill->fresh();
    }
}


