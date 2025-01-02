<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhilippineAddressController;
use App\Http\Controllers\DepartmentController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('address')->group(function(){
    Route::get('regions', [PhilippineAddressController::class, 'getRegions']);
    Route::get('provinces/{region_code}', [PhilippineAddressController::class, 'getProvinces']);
    Route::get('cities/{province_code}', [PhilippineAddressController::class, 'getCities']);
    Route::get('barangays/{city_code}', [PhilippineAddressController::class, 'getBarangays']);
});

Route::prefix('departments')->group(function(){
    Route::get('all', [DepartmentController::class, 'getAllDepartments']);
});
