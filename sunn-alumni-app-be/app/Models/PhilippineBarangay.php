<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhilippineBarangay extends Model
{
    //
    protected $table = 'philippine_barangays';

    protected $fillable = [
        'psgc_code',
        'name',
        'region_code',
        'province_code',
        'city_code'
    ];
}
