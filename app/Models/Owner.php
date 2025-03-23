<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class Owner extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'profile_picture',
        'address',
        'aqama_expiry_date',
        'aqama_cnic_id',
        'status',
        'nafath_verified',
    ];

    const PAGINATE = 25;

    /**
     * Owner status constant pending
     * @var string
     */
    const STATUS_PENDING = 'pending';
    /**
     * Owner status constant verified
     * @var string
     */
    const STATUS_VERIFIED = 'verified';
    /**
     * Owner status constant suspended
     * @var string
     */
    const STATUS_SUSPENDED = 'suspended';

    /**
     * Owner status values
     * @var array
     */
    const STATUS_VALUES = [
        self::STATUS_PENDING,
        self::STATUS_VERIFIED,
        self::STATUS_SUSPENDED,
    ];

    protected $casts = [
        'nafath_verified' => 'boolean',
    ];

    /**
     * Mutator to hash password before saving.
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * Mutator to ensure nafath_verified is stored as a boolean.
     */
    public function setNafathVerifiedAttribute($value)
    {
        $this->attributes['nafath_verified'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }


    /**
     * Save Details of Owner
     * @param Owner $owner
     * @param array $data
     * @return Owner
     * @author M Nabeel Arshad
     * @version 1.0.0
     * @since 2025-02-12
     */
    public static function updateDetails(Owner $owner, array $data) : Owner {
        $fillable = $owner->getFillable();
        foreach ($data as $key => $value) {
            if (in_array($key, $fillable)) {
                $owner->$key = $value;
            }
        }
        $owner->save();
        return $owner;
    }

    /**
     * Get owners data
     * @param array $where
     * @param array $props
     */
    public static function getDetails(array $where = [], array $props = []) {
        $query = Owner::query();
        if (!empty($where)) {
            $query->where($where);
        }
        if(isset($props['paginate']) && $props['paginate'] ) {
            return $query->paginate(self::PAGINATE);
        }
        return $query->get();
    }

    /**
     * Fetch owner's id and name as key value pair
     * @return array
     * @version 1.0.0
     * @since 2025-02-27
     * @author M Nabeel Arshad
     */
    public static function getKeyValuePairs() : array {
        $owners = Owner::getDetails();
        $arr = [];
        foreach ($owners as $key => $owner) {
            $arr[$owner->id] = trim($owner->first_name.' '.$owner->last_name);
        }
        return $arr;
    }


}
