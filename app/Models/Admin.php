<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable, SoftDeletes;


    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile_picture',
        'status',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_SUSPENDED = 2;
    const STATUS_PENDING = 0;
    const PAGINATE = 20;

    const STATUS = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_SUSPENDED => 'Suspended',
        self::STATUS_PENDING => 'Pending',
    ];

    /**
     * Create a new admin.
     * @author M Nabeel Arshad
     * @param array $data
     * @return object
     * @version 1.0.0
     * @since 2025-02-03
     */
    public static function createAdmin(array $data) : object {
        $admin = new Admin();
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->password = Hash::make($data['password']);
        $admin->phone = $data['phone'];
        $admin->status = $data['status'] ?? self::STATUS_PENDING;
        $admin->created_by = $data['created_by'] ?? null;
        $admin->save();
        return $admin;
    }
}
