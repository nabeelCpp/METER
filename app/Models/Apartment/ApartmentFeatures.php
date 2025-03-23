<?php

namespace App\Models\Apartment;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;

class ApartmentFeatures extends Model
{
    protected $fillable = ['feature', 'apartment_id'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    /**
     * Save Details
     * @param self $feature
     * @param array $data
     * @return self
     * @author M Nabeel Arshad
     * @version 1.0.0
     * @since 2025-02-27
     */
    public static function updateDetails(self $feature, array $data) : self {
        $fillable = $feature->getFillable();
        foreach ($data as $key => $value) {
            if (in_array($key, $fillable)) {
                $feature->$key = $value;
            }
        }
        $feature->save();
        return $feature;
    }
}
