<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'civil_status' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'department_id' => 'required|integer',
            'course_id' => 'required|integer',
            'permanent_address_region_id' => 'required|integer',
            'permanent_address_province_id' => 'required|integer',
            'permanent_address_city_id' => 'required|integer',
            'permanent_address_barangay_id' => 'required|integer',
            'present_address_region_id' => 'required|integer',
            'present_address_province_id' => 'required|integer',
            'present_address_city_id' => 'required|integer',
            'present_address_barangay_id' => 'required|integer',
        ],[
            'department_id.required' => 'Department is required.',
            'department_id.integer' => 'Department value is invalid.',
            'course_id.required' => 'Course is required.',
            'course_id.integer' => 'Course value is invalid.',
            'permanent_address_region_id.required' => 'Permanent address region is required.',
            'permanent_address_region_id.integer' => 'Permanent address region value is invalid.',
            'permanent_address_province_id.required' => 'Permanent address province is required.',
            'permanent_address_province_id.integer' => 'Permanent address province value is invalid.',
            'permanent_address_city_id.required' => 'Permanent address city is required.',
            'permanent_address_city_id.integer' => 'Permanent address city value is invalid.',
            'permanent_address_barangay_id.required' => 'Permanent address barangay is required.',
            'permanent_address_barangay_id.integer' => 'Permanent address barangay value is invalid.',
            'present_address_region_id.required' => 'Present address region is required.',
            'present_address_region_id.integer' => 'Present address region value is invalid.',
            'present_address_province_id.required' => 'Present address province is required.',
            'present_address_province_id.integer' => 'Present address province value is invalid.',
            'present_address_city_id.required' => 'Present address city is required.',
            'present_address_city_id.integer' => 'Present address city value is invalid.',
            'present_address_barangay_id.required' => 'Present address barangay is required.',
            'present_address_barangay_id.integer' => 'Present address barangay value is invalid.'
        ]);

        if ($validator->fails()) {
            // Handle validation failure
            return response()->json([
                'message' => 'Validation failed!',
                'errors' => $validator->errors(),
            ], 422);
        }

        User::create([
            ...$request->all(),
            'user_role' => User::USER_ROLE_ALUMNI,
        ]);
        
        return response()->json(['message' => 'Successfully registered. Kindly wait for admin approval of your account.']);
    }
}
