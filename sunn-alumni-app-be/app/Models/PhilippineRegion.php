<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhilippineRegion extends Model
{
    //
    protected $table = 'philippine_regions';

    protected $fillable = [
        'psgc_code',
        'name',
        'region_code'
    ];
}
