<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhilippineProvince extends Model
{
    //
    protected $table = 'philippine_provinces';

    protected $fillable = [
        'psgc_code',
        'name',
        'region_code',
        'province_code'
    ];
}
