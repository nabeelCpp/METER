<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Tenant extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'gender',
        'nationality',
        'profile_picture',
        'password',
        'admin_id',
        'aqama_cnic_id',
        'aqama_expiry_date',
        'nafath_verified',
    ];

    protected $casts = [
        'nafath_verified' => 'boolean',
    ];

     /**
     * Create or update data.
     *
     * @param array $data
     * @param self|null $tenant (If null, a new tenant is created)
     * @return self
     * @throws \Exception
     * @author M Nabeel Arshad
     * @since 2025-03-26
     * @version 1.0.0
     */
    public static function createOrUpdateData(array $data, $tenant = null): self {
        try {
            // Use existing tenant or create new instance
            $tenant = $tenant ?? new self();
            // Fill only the fillable attributes
            $tenant->fill($data);
            // Save changes
            $tenant->save();
            return $tenant;
        } catch (\Exception $e) {
            // tenant error for debugging
            Log::error('Error saving tenant: ' . $e->getMessage());
            throw $e; // Rethrow the exception for further handling
        }
    }

    /**
     * Get data based on where condition
     * @param array $where
     * @param array $props
     * @return mixed
     * @since 2025-03-13
     * @version 1.0.0
     * @author M Nabeel Arshad
    */
    public static function getData(array $where = [], array $props = []) {
        $query = self::query();
        if (!empty($where)) {
            $query->where($where);
        }
        if (isset($props['take'])) {
            return $query->take($props['take'])->get();
        }
        if (isset($props['paginate'])) {
            return $query->paginate($props['paginate']);
        }
        if (isset($props['first'])) {
            return $query->first();
        }
        if (isset($props['find'])) {
            return $query->find($props['find']);
        }
        return $query->get();
    }
}
