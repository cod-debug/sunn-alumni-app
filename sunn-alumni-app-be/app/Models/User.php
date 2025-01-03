<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    public const USER_ROLE_ADMIN = 1;
    public const USER_ROLE_ALUMNI = 2;
    public const USER_ROLE_EMPLOYER = 3;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'civil_status',
        'phone_number',
        'mobile_number',
        'username',
        'email',
        'password',
        'user_role',
        'status',
        'department_id',
        'course_id',
        'permanent_address_region_id',
        'permanent_address_province_id',
        'permanent_address_city_id',
        'permanent_address_barangay_id',
        'permanent_address_1',
        'permanent_address_2',
        'present_address_region_id',
        'present_address_province_id',
        'present_address_city_id',
        'present_address_barangay_id',
        'present_address_1',
        'present_address_2'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
