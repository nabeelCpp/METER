<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Display a listing of the admins.
    public function index()
    {
        $admins = Admin::latest()->paginate(Admin::PAGINATE);
        return view('superadmin.admins.index', compact('admins'));
    }

    // Show the form for creating a new admin.
    public function create()
    {
        return view('superadmin.admins.create');
    }

    // Store a newly created admin in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
        $admin = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'phone'    => $request->phone,
            'status'   => Admin::STATUS_ACTIVE,
            'created_by' => auth()->guard('superadmin')->user()->id,
        ];
        Admin::createAdmin($admin);
        return redirect()->route('superadmin.admins.index')->with('success', 'Admin created successfully.');
    }

    // Show the form for editing the specified admin.
    public function edit(Admin $admin)
    {
        $admin_statuses = Admin::STATUS;
        return view('superadmin.admins.edit', compact('admin', 'admin_statuses'));
    }

    // Update the specified admin in storage.
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'phone' => 'nullable|string',
        ]);

        $data = $request->only('name', 'email', 'phone', 'status');

        // Optionally update password if provided
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6|confirmed',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('superadmin.admins.index')->with('success', 'Admin updated successfully.');
    }

    // Soft delete the specified admin.
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('superadmin.admins.index')->with('success', 'Admin deleted successfully.');
    }
}
