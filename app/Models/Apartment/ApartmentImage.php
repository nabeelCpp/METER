<?php

namespace App\Models\Apartment;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Model;

class ApartmentImage extends Model
{
    protected $fillable = ['apartment_id', 'image_url'];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    /**
     * Save Details
     * @param self $image
     * @param array $data
     * @return self
     * @author M Nabeel Arshad
     * @version 1.0.0
     * @since 2025-02-27
     */
    public static function updateDetails(self $image, array $data) : self {
        $fillable = $image->getFillable();
        foreach ($data as $key => $value) {
            if (in_array($key, $fillable)) {
                $image->$key = $value;
            }
        }
        $image->save();
        return $image;
    }
}
