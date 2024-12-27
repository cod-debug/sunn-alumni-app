<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

use App\Models\PhilippineRegion;
use App\Models\PhilippineProvince;
use App\Models\PhilippineCity;
use App\Models\PhilippineBarangay;

class PhilippineAddressController extends Controller
{
    public function getRegions(){
        try {
            $data = PhilippineRegion::all();
            
            return response()->json($data, Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error($e->getMessage());
    
            return response()->json([
                'success' => false,
                'error' => 'An unexpected error occurred.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getProvinces($region_code){
        try {
            $data = PhilippineProvince::where('region_code', $region_code)->get();
            return response()->json($data, Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error($e->getMessage());
    
            return response()->json([
                'success' => false,
                'error' => 'An unexpected error occurred.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getCities($province_code){
        try {
            $data = PhilippineCity::where('province_code', $province_code)->get();
            return response()->json($data, Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error($e->getMessage());
    
            return response()->json([
                'success' => false,
                'error' => 'An unexpected error occurred.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getBarangays($city_code){
        try {
            $data = PhilippineBarangay::where('city_code', $city_code)->get();
            return response()->json($data, Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error($e->getMessage());
    
            return response()->json([
                'success' => false,
                'error' => 'An unexpected error occurred.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
