<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    //
    protected $table = "courses";

    protected $fillable = [
        'id',
        'department_id',
        'course_name',
        'course_accronym',
        'course_description',
        'status'
    ];
}
