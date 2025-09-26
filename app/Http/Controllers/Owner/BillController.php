<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillCategory;
use App\Models\Flat;
use App\Notifications\BillCreated;
use App\Notifications\BillPaid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $data['bill_categories'] = BillCategory::get();
        $data['flats'] = Flat::select(
            'flats.id',
            'flats.flat_number',
            'flats.house_owner_id',
            DB::raw("SUM(CASE WHEN bills.status = 'paid' THEN bills.amount ELSE 0 END) as paid_total"),
            DB::raw("SUM(CASE WHEN bills.status = 'unpaid' THEN bills.amount ELSE 0 END) as unpaid_total")
        )
            ->leftJoin('bills', 'bills.flat_id', '=', 'flats.id')
            ->where('flats.house_owner_id', $ownerId)
            ->groupBy('flats.id', 'flats.flat_number', 'flats.house_owner_id')
            ->with('owner')   // eager load owner
            ->get();
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
        if (!empty(env('MAIL_USERNAME'))) {
            Notification::route('mail', $request->user()->email)->notify(new BillCreated($bill));
        }
        return redirect()->route('owner.bills.index')
            ->with('success', 'Bill created successfully.');
    }
    public function getFlatBills(Request $request,Flat $flat){
        abort_unless($flat->house_owner_id === $request->user()->id, 403);
        $data = array();
        $data['title'] = get_phrase('Make Bill');
        $data['module'] = get_phrase('Owner');
        $data['link_page_name'] = get_phrase('Create bill');
        $data['link_page_url'] = 'owner.bills.index';
        $data['link_page_icon'] = '<i class="fa add"></i>';
        $data['unpaid_bills'] = Bill::where('flat_id', $flat->id)->where('status', 'unpaid')->orderBy('id','desc')->get();
        $data['paid_bills'] = Bill::where('flat_id', $flat->id)->where('status', 'paid')->get();
        $data['flat'] = $flat;
        return view('backend.pages.bill.flat_bills', $data);
    }


    public function markPaid(Request $request, Bill $bill)
    {
        abort_unless($bill->house_owner_id === $request->user()->id, 403);
        $bill->update(['status' => 'paid']);
        if (!empty(env('MAIL_USERNAME'))) {
            Notification::route('mail', $request->user()->email)->notify(new BillPaid($bill));
        }
        return redirect()->route('owner.bills.index')
            ->with('success', 'Bill Paid successfully.');
    }
}


