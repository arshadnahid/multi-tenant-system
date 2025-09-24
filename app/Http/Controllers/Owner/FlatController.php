<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Flat;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    public function index(Request $request)
    {
        $ownerId = $request->user()->id;
        return Flat::where('house_owner_id', $ownerId)->with('building:id,name')->paginate(20);
    }

    public function store(Request $request)
    {
        $ownerId = $request->user()->id;
        $data = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'flat_number' => 'required|string',
            'owner_name' => 'nullable|string',
            'owner_contact' => 'nullable|string',
            'owner_email' => 'nullable|email',
        ]);
        $building = Building::where('id', $data['building_id'])->where('house_owner_id', $ownerId)->firstOrFail();
        $flat = Flat::create(array_merge($data, ['house_owner_id' => $ownerId]));
        return response()->json($flat, 201);
    }

    public function update(Request $request, Flat $flat)
    {
        abort_unless($flat->house_owner_id === $request->user()->id, 403);
        $data = $request->validate([
            'flat_number' => 'sometimes|required|string',
            'owner_name' => 'nullable|string',
            'owner_contact' => 'nullable|string',
            'owner_email' => 'nullable|email',
        ]);
        $flat->update($data);
        return $flat;
    }

    public function destroy(Request $request, Flat $flat)
    {
        abort_unless($flat->house_owner_id === $request->user()->id, 403);
        $flat->delete();
        return response()->noContent();
    }
}


