<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_identity', 'name', 'phone', 'division', 'address'];
}
