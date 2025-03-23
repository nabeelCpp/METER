<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Apartment\ApartmentFeatures;
use App\Models\Apartment\ApartmentImage;
use App\Models\Building;
use App\Traits\ApartmentTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppartmentController extends Controller
{
    use ApartmentTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Building $building)
    {
        $apartments = $building->apartments()->paginate(Apartment::PAGINATION);
        return view('admin.apartments.index', compact('apartments', 'building'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Building $building)
    {
        return view('admin.apartments.create', compact('building'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Building $building)
    {
        $validated = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor_number' => 'required',
            'apartment_number' => 'required|string|max:10|unique:apartments,apartment_number,NULL,id,building_id,'.$building->id,
            'rooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'rent' => 'required|numeric|min:0',
            'size_sqft' => 'required',
            'features' => 'nullable|string',
            'image_urls' => 'required|string',
        ]);

        ApartmentTrait::saveApartmentDetails($building, $request->all());

        return redirect()->route('admin.buildings.apartments.index', $building)
            ->with('success', __('admin.Apartment added successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building, Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment', 'building'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building, Apartment $apartment)
    {
        return view('admin.apartments.create', compact('building', 'apartment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Building $building, Apartment $apartment)
    {
        $validated = $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor_number' => 'required',
            'apartment_number' => 'required|string|max:10|unique:apartments,apartment_number,'.$apartment->id.',id,building_id,'.$building->id,
            'rooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'rent' => 'required|numeric|min:0',
            'size_sqft' => 'required',
            'features' => 'nullable|string',
            'image_urls' => 'required|string',
        ]);

        // $apartment->update($validated);
        ApartmentTrait::saveApartmentDetails($building, $request->all(), $apartment);

        return redirect()->route('admin.buildings.apartments.index', $building)
            ->with('success', __('admin.Apartment updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building, Apartment $apartment)
    {
        $apartment->delete();

        return redirect()->route('admin.buildings.apartments.index', $building)
            ->with('success', __('admin.Apartment deleted successfully.'));
    }

    /**
     * Handle bulk apartment upload.
     */
    public function bulkUpload(Request $request, Building $building)
    {
        // Validate file input
        $request->validate([
            'apartments_file' => 'required|mimes:csv,xlsx|max:2048', // Allow CSV and Excel files
        ]);

        // Get file
        $file = $request->file('apartments_file');

        // Read file contents
        $data = [];
        if ($file->getClientOriginalExtension() == 'csv') {
            $data = csv_to_array($file);
        }else if($file->getClientOriginalExtension() == 'xlsx'){
            $data = excel_to_array($file);
        }

        if (empty($data)) {
            return redirect()->back()->withErrors(['apartments_file' => 'The uploaded file is empty or invalid.']);
        }

        // Validate each row
        foreach ($data as $row) {
            $validator = Validator::make($row, [
                'floor_number' => 'required|integer|min:1',
                'apartment_number' => 'required|string|max:10|unique:apartments,apartment_number,NULL,id,building_id,'.$building->id,
                'rooms' => 'required|integer|min:1',
                'bathrooms' => 'required|integer|min:1',
                'rent' => 'required|numeric|min:0',
                'size_sqft' => 'required|numeric|min:1',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        // Insert data into the database
        foreach ($data as $row) {
           ApartmentTrait::saveApartmentDetails($building, $row);
        }

        return redirect()->route('admin.buildings.apartments.index', $building)
            ->with('success', 'Bulk Apartments uploaded successfully.');
    }

    public function deleteAll(Building $building)
    {
        // Delete related images and features first
        foreach ($building->apartments as $apartment) {
            $apartment->features()->delete();
            $apartment->images()->delete();
        }

        // Delete apartments
        $building->apartments()->delete();

        return redirect()->route('admin.buildings.apartments.index', $building)
            ->with('success', __('admin.All apartments deleted successfully.'));
    }

}
