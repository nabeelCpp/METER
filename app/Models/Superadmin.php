<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Superadmin extends Authenticatable
{
    protected $table = 'superadmins';
    protected $fillable = ['name', 'email', 'password'];
}
