<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    //
    protected $table = "departments";

    protected $fillable = [
        'department_name',
        'department_accronym',
        'department_description',
        'department_image',
        'status'
    ];

    public function courses(){
        return $this->hasMany(CourseModel::class, 'department_id', 'id');
    }
}
