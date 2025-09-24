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
                    'mobile' => $t->contact ?? '',
                    'email' => $t->email ?? '',
                    'fcm_id' => '',
                    'date' => optional($t->created_at)->format('Y-m-d'),
                    'roles' => 'Tenant',
                    'image' => '',
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

        $tenants = Tenant::with(['owner:id,name'])->paginate(20);
        $owners = User::where('role', 'owner')->get(['id','name','email']);
        $data = array();
        $data['title'] = get_phrase('Tenants');
        $data['module'] = get_phrase('Admin');
        $data['tenants'] = $tenants;
        $data['owners'] = $owners;
        return view('backend.pages.admin.tenant.index', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'contact' => 'nullable|string',
            'email' => 'nullable|email',
            'house_owner_id' => 'required|exists:users,id',
            // building fields removed; tenants no longer reference building_id
        ]);

        // Ensure building belongs to owner
        $building = Building::where('id', $data['assigned_building_id'])
            ->where('house_owner_id', $data['house_owner_id'])
            ->firstOrFail();

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

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('admin.tenants.index')->with('success', get_phrase('Tenant removed successfully'));
    }
}


