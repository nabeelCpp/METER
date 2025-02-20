<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::latest()->paginate(Owner::PAGINATE);
        return view('admin.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = Owner::STATUS_VALUES;
        return view('admin.owners.create',  compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:owners,email',
            'phone' => 'required|unique:owners,phone',
            'aqama_expiry_date' => 'nullable|date',
            'status' => 'required|in:'.implode(',', Owner::STATUS_VALUES),
            'nafath_verified' => 'nullable',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image',
            'password' => 'required|string|min:8',
            'aqama_cnic_id' => 'required|unique:owners,aqama_cnic_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create owner
        $owner = new Owner();
        $data = $request->all();
        Owner::updateDetails($owner, $data);
        return redirect()->route('admin.owners.index')->with('success', 'Owner created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Owner $owner)
    {
        $status = Owner::STATUS_VALUES;
        return view('admin.owners.create', compact('owner', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => ['required', 'email', Rule::unique('owners', 'email')->ignore($owner->id)],
            'phone' => ['required', Rule::unique('owners', 'phone')->ignore($owner->id)],
            'aqama_expiry_date' => 'nullable|date',
            'status' => ['required', Rule::in(Owner::STATUS_VALUES)],
            'nafath_verified' => 'nullable',
            'address' => 'nullable|string',
            'profile_picture' => 'nullable|image',
            'password' => 'nullable|string|min:8', // Only required on create, not on update
            'aqama_cnic_id' => ['required', Rule::unique('owners', 'aqama_cnic_id')->ignore($owner->id)],
        ]);

        // If validation fails
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get validated data
        $validated = $validator->validated();

        // If password is provided, update it (handled by mutator)
        if (!$request->filled('password')) {
            unset($validated['password']);
        }

        // Update the owner record
        $owner->update($validated);

        return redirect()->route('admin.owners.index')->with('success', __('admin.Owner updated successfully!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('admin.owners.index')->with('success', __('admin.Owner deleted successfully!'));
    }
}
