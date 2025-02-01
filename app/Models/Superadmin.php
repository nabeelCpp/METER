<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    protected $table = 'superadmins';
    protected $fillable = ['name', 'email', 'password'];
}
