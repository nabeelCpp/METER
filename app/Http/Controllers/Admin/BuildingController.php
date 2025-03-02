<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Owner;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::latest()->paginate(Building::PAGINATION);
        return view('admin.buildings.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['owners'] = Owner::getKeyValuePairs();
        return view('admin.buildings.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
            'number_of_floors' => 'required|integer|min:1',
            'total_units' => 'required|integer|min:1',
        ]);
        $data = $request->all();
        Building::updateDetails(new Building(), $data);

        return redirect()->route('admin.buildings.index')->with('success', __('admin.Building added successfully!'));
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
    public function edit(Building $building)
    {
        $owners = Owner::getKeyValuePairs();
        return view('admin.buildings.create', compact('building', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string',
            'number_of_floors' => 'required|integer|min:1',
            'total_units' => 'required|integer|min:1',
        ]);
        Building::updateDetails($building, $request->all());

        return redirect()->route('admin.buildings.index')->with('success', __('admin.Building updated successfully!'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return redirect()->route('admin.buildings.index')->with('success', __('admin.Building deleted successfully!'));
    }
}
