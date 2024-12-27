<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhilippineCity extends Model
{
    //
    protected $table = 'philippine_cities';

    protected $fillable = [
        'psgc_code',
        'name',
        'region_code',
        'province_code',
        'city_code'
    ];
}
