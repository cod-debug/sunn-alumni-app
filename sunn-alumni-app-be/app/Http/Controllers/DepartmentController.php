<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

use App\Models\DepartmentModel;


class DepartmentController extends Controller
{
    //
    public function getAllDepartments(){
        try {
            $data = DepartmentModel::where('status', 'active')->with('courses')->get();
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
