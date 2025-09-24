<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Tenant::with(['owner:id,name']);

            if ($search = $request->get('search')) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('contact', 'like', "%{$search}%");
                });
            }

            $total = $query->count();
            $start = (int) $request->get('start', 0);
            $length = (int) $request->get('length', 30);
            $tenants = $query->skip($start)->take($length)->orderByDesc('id')->get();

            $data = $tenants->map(function (Tenant $t) {
                return [
                    'id' => $t->id,
                    'name' => $t->name,
                    'building_name' => $t->owner->name,
                    'mobile' => $t->contact ?? '',
                    'email' => $t->email ?? '',
                    'action' => view('backend.pages.admin.tenant.btn', ['tenant' => $t])->render(),
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
        $data['title'] = get_phrase('Tenants');
        $data['module'] = get_phrase('Admin');
        $data['link_page_name'] = get_phrase('Add Tenants');
        $data['link_page_url'] = 'admin.tenants.create';
        $data['link_page_icon'] = '<i class="fa fa-plus-square"></i>';
        return view('backend.pages.admin.tenant.index', $data);
    }
    public function create()
    {
        $data = array();
        $data['title'] = get_phrase('Create Tenants');
        $data['module'] = get_phrase('Admin');
        $data['link_page_name'] = get_phrase('Tenant List');
        $data['link_page_url'] = 'admin.tenants.index';
        $data['link_page_icon'] = '<i class="fa fa-list"></i>';
        $data['owners'] = User::where('role', 'owner')->get(); // Assuming role_id 3 is for house owners
        return view('backend.pages.admin.tenant.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'contact' => 'nullable|string',
            'email' => 'nullable|email',
            'house_owner_id' => 'required|exists:users,id',
        ]);

        Tenant::create($data);
        return redirect()->route('admin.tenants.index')->with('success', get_phrase('Tenant created successfully'));
    }

    public function show(Tenant $tenant)
    {
        $data = array();
        $data['title'] = get_phrase('Tenant Details');
        $data['module'] = get_phrase('Admin');
        $data['tenant'] = $tenant->load(['building', 'owner']);
        return view('backend.pages.admin.tenant.show', $data);
    }

    public function edit(Tenant $owner)
    {
        $data = array();
        $data['title'] = get_phrase('Edit Tenant ');
        $data['module'] = get_phrase('Admin');
        $data['link_page_name'] = get_phrase('Tenant List');
        $data['link_page_url'] = 'admin.tenants.index';
        $data['link_page_icon'] = '<i class="fa fa-list"></i>';
        $data['second_link_page_name'] =  get_phrase('Tenant List');
        $data['second_link_page_url'] = 'admin.tenants.index';
        $data['second_link_page_icon'] = '<i class="fa fa-plus-square"></i>';
        $data['owners'] = User::where('role', 'owner')->get();
        return view('backend.pages.admin.tenant.edit', $data);
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('admin.tenants.index')->with('success', get_phrase('Tenant removed successfully'));
    }
}


