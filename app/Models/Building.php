<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Building extends Model
{
    protected $fillable = ['admin_id', 'owner_id', 'name', 'address', 'city', 'state', 'country', 'postal_code', 'latitude', 'longitude', 'number_of_floors', 'total_units', 'description', 'status'];

    const PAGINATION = GLOBAL_PAGINATION;

    /**
     * Active Status of building
     * @var int
     */
    const STATUS_ACTIVE = 1;
    /**
     * Inactive Status of building
     * @var int
     */
    const STATUS_INACTIVE = 0;

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    /**
     * Save Details
     * @param self $building
     * @param array $data
     * @return self
     * @author M Nabeel Arshad
     * @version 1.0.0
     * @since 2025-02-27
     */
    public static function updateDetails(self $building, array $data) : self {
        $fillable = $building->getFillable();
        foreach ($data as $key => $value) {
            if (in_array($key, $fillable)) {
                $building->$key = $value;
            }
        }
        $building->save();
        return $building;
    }

    /**
     * Get data
     * @param array $where
     * @param array $props
     * @return Collection
     */
    public static function getDetails(array $where = [], array $props = []) : Collection {
        $query = Building::query();
        if (!empty($where)) {
            $query->where($where);
        }
        if(isset($props['paginate']) && $props['paginate'] ) {
            return $query->paginate(self::PAGINATION);
        }
        return $query->get();
    }

}
