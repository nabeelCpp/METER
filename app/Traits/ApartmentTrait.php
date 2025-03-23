<?php

namespace App\Traits;

use App\Models\Apartment;
use App\Models\Apartment\ApartmentFeatures;
use App\Models\Apartment\ApartmentImage;
use App\Models\Building;

trait ApartmentTrait
{
    /**
     * Save apartment details
     * @param Building $building
     * @param array $data
     * @param Apartment $apartment
     * @return Apartment
     * @author M Nabeel Arshad
     * @version 1.0.0
     * @since 2025-03-17
     */
    public static function saveApartmentDetails(Building $building, array $data, Apartment $apartment = new Apartment()) : Apartment {
        $apartment = Apartment::updateDetails($apartment, [
            'building_id' => $building->id,
            'floor_number' => $data['floor_number'],
            'apartment_number' => $data['apartment_number'],
            'rooms' => $data['rooms'],
            'bathrooms' => $data['bathrooms'],
            'rent' => $data['rent'],
            'size_sqft' => $data['size_sqft'],
            'is_available' => $apartment->is_available ?? Apartment::STATUS_VACANT,
            'status' => $apartment->status ?? Apartment::STATUS_ACTIVE,
        ]);

        $oldFeatures = $apartment->features;
        if ($oldFeatures) {
            $oldFeatures->each->delete();
        }

        // Store features
        if (!empty($data['features'])) {
            $features = explode(',', $data['features']); // Convert CSV string into an array
            foreach ($features as $feature) {
                ApartmentFeatures::updateDetails(new ApartmentFeatures(), [
                    'apartment_id' => $apartment->id,
                    'feature' => trim($feature),
                ]);
            }
        }

        $oldImages = $apartment->images;
        if ($oldImages) {
            $oldImages->each->delete();
        }

        // Store images
        if (!empty($data['image_urls'])) {
            $imageUrls = explode(',', $data['image_urls']); // Split CSV image URLs
            foreach ($imageUrls as $imageUrl) {
                ApartmentImage::updateDetails(new ApartmentImage(), [
                    'apartment_id' => $apartment->id,
                    'image_url' => trim($imageUrl),
                ]);
            }
        }
        return $apartment;
    }
}
