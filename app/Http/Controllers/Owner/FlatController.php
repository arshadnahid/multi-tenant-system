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
        $data['flats'] =   Flat::with('owner')->get();
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
    public function edit(Flat $flat)
    {
        $data = array();
        $data['title'] = get_phrase('Edit Flat');
        $data['module'] = get_phrase('Owner');
        $data['link_page_name'] = get_phrase('Flat List');
        $data['link_page_url'] = 'owner.flats.index';
        $data['link_page_icon'] = '<i class="fa fa-list"></i>';
        $data['second_link_page_name'] =  get_phrase('Flat add');
        $data['second_link_page_url'] = 'owner.flats.create';
        $data['second_link_page_icon'] = '<i class="fa fa-plus-square"></i>';
        $data['flat'] = $flat;
        return view('backend.pages.flats.edit', $data);
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
            'flat_number' => 'required|string',
        ]);
        $flat->update($data);
        return redirect()->route('owner.flats.index')->with('success', get_phrase('Flat updated successfully'));
    }

    public function destroy(Request $request, Flat $flat)
    {
        abort_unless($flat->house_owner_id === $request->user()->id, 403);
        $flat->delete();
        return redirect()->route('owner.flats.index')->with('success', get_phrase('Flat removed successfully'));
    }
}


