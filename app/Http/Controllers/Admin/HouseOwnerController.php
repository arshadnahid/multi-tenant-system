<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HouseOwnerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::where('role', 'owner');

            if ($search = $request->get('search')) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            }

            $total = $query->count();
            $start = (int) $request->get('start', 0);
            $length = (int) $request->get('length', 30);
            $owners = $query->skip($start)->take($length)->orderByDesc('id')->get();

            $data = $owners->map(function (User $u) {
                return [
                    'id' => $u->id,
                    'name' => '<a href="'.route('admin.owners.show', $u).'">'.e($u->name).'</a>',
                    'email' => $u->email,
                    'building_name' => $u->building_name,
                    'building_address' => $u->building_address,
                    'action' => view('backend.pages.admin.home-owner.btn', ['user' => $u])->render(),
                ];
            })->toArray();

            return response()->json([
                'draw' => (int) $request->get('draw', 1),
                'recordsTotal' => $total,
                'recordsFiltered' => $total,
                'data' => $data,
            ]);
        }

        $data = array();
        $data['title'] = get_phrase('House Owners');
        $data['module'] = get_phrase('Admin');
        $data['link_page_name'] = get_phrase('Add House Owner');
        $data['link_page_url'] = 'admin.owners.create';
        $data['link_page_icon'] = '<i class="fa fa-plus-square"></i>';

        return view('backend.pages.admin.home-owner.index', $data);
    }

    public function create()
    {
        $data = array();
        $data['title'] = get_phrase('Create House Owner');
        $data['module'] = get_phrase('Admin');
        $data['link_page_name'] = get_phrase('Home Owner List');
        $data['link_page_url'] = 'admin.owners.index';
        $data['link_page_icon'] = '<i class="fa fa-list"></i>';

        return view('backend.pages.admin.home-owner.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'building_name' => 'required|string',
            'building_address' => 'nullable|string',
        ]);

       User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt(12345678),
            'role' => 'owner',
            'building_name' => $data['building_name'],
            'building_address' => $data['building_address'] ?? null,
        ]);


        return redirect()->route('admin.owners.index')->with('success', get_phrase('Owner created successfully'));
    }

    public function show(User $owner)
    {
        abort_unless($owner->role === 'owner', 404);
        $data = array();
        $data['title'] = get_phrase('Owner Details');
        $data['module'] = get_phrase('Admin');
        $data['owner'] = $owner;
        return view('backend.pages.admin.home-owner.show', $data);
    }

    public function edit(User $owner)
    {
        abort_unless($owner->role === 'owner', 404);
        $data = array();
        $data['title'] = get_phrase('Edit House Owner');
        $data['module'] = get_phrase('Admin');
        $data['link_page_name'] = get_phrase('Home Owner List');
        $data['link_page_url'] = 'admin.owners.index';
        $data['link_page_icon'] = '<i class="fa fa-list"></i>';
        $data['second_link_page_name'] =  get_phrase('Home Owner add');
        $data['second_link_page_url'] = 'admin.owners.create';
        $data['second_link_page_icon'] = '<i class="fa fa-plus-square"></i>';
        $data['owner'] = $owner;
        return view('backend.pages.admin.home-owner.edit', $data);
    }

    public function update(Request $request, User $owner)
    {
        abort_unless($owner->role === 'owner', 404);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$owner->id,
            'building_name' => 'required|string',
            'building_address' => 'nullable|string',
        ]);
        $update = [
            'name' => $data['name'],
            'email' => $data['email'],
            'building_name' => $data['building_name'],
            'building_address' => $data['building_address'],
        ];
        $owner->update($update);
        return redirect()->route('admin.owners.index')->with('success', get_phrase('Owner updated successfully'));
    }

    public function destroy(User $owner)
    {
        abort_unless($owner->role === 'owner', 404);
        $owner->delete();
        return redirect()->route('admin.owners.index')->with('success', get_phrase('Owner removed successfully'));
    }
}


