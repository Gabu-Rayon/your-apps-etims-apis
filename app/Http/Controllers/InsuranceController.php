<?php

namespace App\Http\Controllers;
use App\Models\Insurance;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return response()->json($insurances);
    }

    public function show($id)
    {
        $insurances = Insurance::find($id);
        return response()->json($insurances);
    }

    public function store(Request $request) {
        try {
            $data = $request->all();
        
            $validator = Validator::make($request->all(), [
                'insuranceCode' => 'required|string|unique:insurances|min:1|max:10',
                'insuranceName' => 'required|string|min:1|max:100',
                'premiumRate' => 'required|numeric',
                'isUsed' => 'boolean',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }
        
            Log::info('Request data');
            Log::info($data);
        
            $insurance = Insurance::create($data);
            $now = date('YmdHis');
            
            Log::info('Insurance created successfully');
            Log::info($insurance);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'insurance : ' => $insurance
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create Insurance');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Insurance',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $insurances = Insurance::find($id);
        $insurances->update($request->all());
        return response()->json($insurances, 200);
    }

    public function destroy($id)
    {
        Insurance::destroy($id);
        return response()->json(null, 204);
    }
}