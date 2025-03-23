<?php

namespace App\Models;

use App\Models\Apartment\ApartmentFeatures;
use App\Models\Apartment\ApartmentImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Apartment extends Model
{
    protected $fillable = ['building_id', 'floor_number', 'apartment_number', 'rooms', 'bathrooms', 'rent', 'size_sqft', 'is_available', 'status'];

    /**
     * Vacant Status of apartment
     * @var int
     */
    const STATUS_VACANT = 1;
    /**
     * Rented Status of apartment
     * @var int
     */
    const STATUS_RENTED = 0;

    /**
     * status array
     * @var array
     */
    const STATUS_AVAILABLE_ARRAY = [
        self::STATUS_VACANT => 'Vacant',
        self::STATUS_RENTED => 'Rented'
    ];

    /**
     * Active Status of apartment
     * @var int
     */
    const STATUS_ACTIVE = 1;

    /**
     * status array
     * @var array
     */
    const STATUS_ARRAY = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    /**
     * Inactive Status of apartment
     * @var int
     */
    const STATUS_INACTIVE = 0;

    /**
     * Pagination
     * @var int
     */
    const PAGINATION = GLOBAL_PAGINATION;

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function features() : Relation
    {
        return $this->hasMany(ApartmentFeatures::class);
    }

    public function images() : Relation
    {
        return $this->hasMany(ApartmentImage::class);
    }

    /**
     * Save Details
     * @param self $apartment
     * @param array $data
     * @return self
     * @author M Nabeel Arshad
     * @version 1.0.0
     * @since 2025-02-27
     */
    public static function updateDetails(self $apartment, array $data) : self {
        $fillable = $apartment->getFillable();
        foreach ($data as $key => $value) {
            if (in_array($key, $fillable)) {
                $apartment->$key = $value;
            }
        }
        $apartment->save();
        return $apartment;
    }

}
