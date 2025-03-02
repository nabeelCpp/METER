<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillables = ['building_id', 'tenant_id', 'name', 'floor_number', 'number_of_rooms', 'number_of_bathrooms', 'size_sqft', 'rent_price', 'yearly_discount', 'status'];

    /**
     * Vacant Status of apartment
     * @var int
     */
    const STATUS_VACANT = 0;
    /**
     * Rented Status of apartment
     * @var int
     */
    const STATUS_RENTED = 1;

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    // public function tenant()
    // {
    //     return $this->belongsTo(Tenant::class);
    // }
}
