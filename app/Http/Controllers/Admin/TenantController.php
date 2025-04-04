<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::getData([], ['paginate' => GLOBAL_PAGINATION]);
        return view('admin.tenants.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'nullable|string|max:255',
            'email'             => 'required|email|unique:tenants,email',
            'phone'             => 'required|unique:tenants,phone',
            'gender'            => 'nullable|in:male,female,other',
            'nationality'       => 'nullable|string|max:100',
            'address'           => 'nullable|string|max:255',
            'aqama_cnic_id'     => 'required|unique:tenants,aqama_cnic_id',
            'aqama_expiry_date' => 'required|date',
            'profile_picture'   => 'nullable|image|max:2048',
            'password'          => 'required|string|min:8|confirmed',
            'nafath_verified'   => 'nullable',
        ]);

        $data = $request->except('profile_picture', 'password_confirmation');
        $data['admin_id'] = auth('admin')->id();
        $data['password'] = Hash::make($request->password);
        $data['nafath_verified'] = $request->has('nafath_verified');

        // Upload profile picture
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('tenants', 'public');
        }
        Tenant::createOrUpdateData($data);

        return redirect()->route('admin.tenants.index')->with('success', __('admin.Tenant created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        return view('admin.tenants.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        // remove password from tenant data
        unset($tenant->password);
        return view('admin.tenants.create', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'nullable|string|max:255',
            'email'             => ['required', 'email', Rule::unique('tenants')->ignore($tenant->id)],
            'phone'             => ['required', Rule::unique('tenants')->ignore($tenant->id)],
            'gender'            => 'nullable|in:male,female,other',
            'nationality'       => 'nullable|string|max:100',
            'address'           => 'nullable|string|max:255',
            'aqama_cnic_id'     => ['required', Rule::unique('tenants')->ignore($tenant->id)],
            'aqama_expiry_date' => 'required|date',
            'profile_picture'   => 'nullable|image|max:2048',
            'password'          => 'nullable|string|min:8|confirmed',
            'nafath_verified'   => 'nullable',
        ]);

        $data = $request->except('profile_picture', 'password_confirmation');
        $data['nafath_verified'] = $request->has('nafath_verified');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }else {
            unset($data['password']);
        }

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('tenants', 'public');
        }

        Tenant::createOrUpdateData($data, $tenant);

        return redirect()->route('admin.tenants.index')->with('success', __('admin.Tenant updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->back()->with('success', __('admin.Tenant deleted successfully.'));
    }
}
