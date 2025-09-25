<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\BillCategory;
use Illuminate\Http\Request;

class BillCategoryController extends Controller
{
    public function index(Request $request)
    {
        $ownerId = $request->user()->id;
        $data=array();
        $data['title'] = get_phrase('Bill Category');
        $data['module'] = get_phrase('Owner');
        $data['bill_categories']= BillCategory::where('house_owner_id', $ownerId)->get();
        return view('backend.pages.bill_categories.index', $data);
    }

    public function store(Request $request)
    {
        $ownerId = $request->user()->id;
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        $category = BillCategory::create(['house_owner_id' => $ownerId, 'name' => $data['name']]);
        return redirect()->route('owner.bill_categories.index')->with('success', get_phrase('bill category created successfully'));
    }
    public function edit(Request $request,BillCategory $billCategory)
    {
        abort_unless($billCategory->house_owner_id === $request->user()->id, 403);
        $ownerId = $request->user()->id;
        $data=array();
        $data['title'] = get_phrase('Bill Category Edit');
        $data['module'] = get_phrase('Owner');
        $data['link_page_name'] = get_phrase('Add Bill Category');
        $data['link_page_url'] = 'owner.bill_categories.index';
        $data['link_page_icon'] = '<i class="fa fa-plus-square"></i>';
        $data['bill_category']= $billCategory;
        $data['bill_categories']= BillCategory::where('house_owner_id', $ownerId)->get();
        return view('backend.pages.bill_categories.edit', $data);
    }
    public function update(Request $request, BillCategory $billCategory)
    {
        abort_unless($billCategory->house_owner_id === $request->user()->id, 403);
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        $billCategory->update($data);
        return $billCategory;
    }

    public function destroy(Request $request, BillCategory $billCategory)
    {
        abort_unless($billCategory->house_owner_id === $request->user()->id, 403);
        $billCategory->delete();
        return redirect()->route('owner.bill_categories.index')->with('success', get_phrase('Bill Category successfully'));
    }
}


