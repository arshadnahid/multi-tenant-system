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
use Illuminate\Validation\Rule;

class BillController extends Controller
{
    public function index(Request $request)
    {
        $ownerId = $request->user()->id;
        $data = array();
        $data['title'] = get_phrase('Make Bill');
        $data['module'] = get_phrase('Owner');
        $data['bill_categories'] = BillCategory::where('house_owner_id', $ownerId)->get();
        $data['falts'] = Flat::where('house_owner_id', $ownerId)->get();
        return view('backend.pages.bill.index', $data);
    }



    public function store(Request $request)
    {
        $ownerId = $request->user()->id;

        $data = $request->validate([
            'flat_id' => [
                'required',
                Rule::exists('flats', 'id')->where(function ($query) use ($ownerId) {
                    $query->where('house_owner_id', $ownerId);
                }),
            ],
            'bill_category_id' => [
                'required',
                Rule::exists('bill_categories', 'id')->where(function ($query) use ($ownerId) {
                    $query->where('house_owner_id', $ownerId);
                }),
            ],
            'month' => [
                'required',
                'regex:/^\d{4}-(0[1-9]|1[0-2])$/', // YYYY-MM format
            ],
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,unpaid',
            'notes' => 'nullable|string',
        ]);

        $bill= Bill::create(array_merge($data, ['house_owner_id' => $ownerId]));
        Notification::route('mail', $request->user()->email)->notify(new BillCreated($bill));
        return redirect()->route('owner.bills.index')
            ->with('success', 'Bill created successfully.');
    }



    public function markPaid(Request $request, Bill $bill)
    {
        abort_unless($bill->house_owner_id === $request->user()->id, 403);
        $bill->update(['status' => 'paid']);
        Notification::route('mail', $request->user()->email)->notify(new BillPaid($bill));
        return $bill->fresh();
    }
}


