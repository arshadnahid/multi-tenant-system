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
        $data = array();
        $data['title'] = get_phrase('Flat List');
        $data['module'] = get_phrase('Owner');
        $data['link_page_name'] = get_phrase('Add Flat');
        $data['link_page_url'] = 'owner.flats.create';
        $data['link_page_icon'] = '<i class="fa fa-plus-square"></i>';
        $data['flats'] =   Flat::where('house_owner_id', $ownerId)->with('owner')->get();
        return view('backend.pages.flats.index', $data);
    }
    public function create()
    {
        $data = array();
        $data['title'] = get_phrase('Create Flat');
        $data['module'] = get_phrase('Owner');
        $data['link_page_name'] = get_phrase('Flat List');
        $data['link_page_url'] = 'owner.flats.index';
        $data['link_page_icon'] = '<i class="fa fa-list"></i>';
        return view('backend.pages.flats.create', $data);
    }

    public function store(Request $request)
    {
        $ownerId = $request->user()->id;
        $data = $request->validate([
            'flat_number' => 'required|string',
        ]);
        Flat::create(array_merge($data, ['house_owner_id' => $ownerId]));
        return redirect()->route('owner.flats.index')->with('success', get_phrase('Flat created successfully'));
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


