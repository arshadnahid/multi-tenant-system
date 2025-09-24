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
        return BillCategory::where('house_owner_id', $ownerId)->paginate(20);
    }

    public function store(Request $request)
    {
        $ownerId = $request->user()->id;
        $data = $request->validate([
            'name' => 'required|string',
        ]);
        $category = BillCategory::create(['house_owner_id' => $ownerId, 'name' => $data['name']]);
        return response()->json($category, 201);
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
        return response()->noContent();
    }
}


