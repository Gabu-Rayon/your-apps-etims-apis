<?php

namespace App\Http\Controllers;

use App\Models\Initialization;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class InitializationController extends Controller
{
    public function index() {
        try {
            $initializations = Initialization::all();
            $now = date('YmdHis');
            Log::info('Initializations retrieved successfully');
            Log::info($initializations);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'initsLst' => $initializations
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get Initializations');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get Initializations',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Initialization $initialization) {
        try {
            $now = date('YmdHis');
            Log::info('Initialization retrieved successfully');
            Log::info($initialization);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'init' => $initialization
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get initialization');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get initialization',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request) {
        try {

            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'tin' => 'required|size:11',
                'bhfId' => 'required|size:2',
                'dvcSrlNo' => 'required|min:1'
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }
            
            $initialization = new Initialization();
            $initialization->tin = $request->tin;
            $initialization->bhfId = $request->bhfId;
            $initialization->dvcSrlNo = $request->dvcSrlNo;
            $initialization->save();
            $now = date('YmdHis');
            Log::info('Initialization created successfully');
            Log::info($initialization);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'init' => $initialization
                    ]
                ]
            ]);
        } catch (QueryException $e) {
            Log::error('Failed to create initialization');
            Log::error($e);
            return response()->json([
                'message' => 'error',
                'error' => 'Branch not found'
            ], 500);
        }
        catch (\Exception $e) {
            Log::error('Failed to create initialization');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create initialization',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update (Request $request, Initialization $initialization) {
        try {
            $data = $request->all();
            $now = date('YmdHis');
            $initialization->tin = $request->tin;
            $initialization->bhfId = $request->bhfId;
            $initialization->dvcSrlNo = $request->dvcSrlNo;
            $initialization->save();
            Log::info('Initialization updated successfully');
            Log::info($initialization);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'init' => $initialization
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update initialization');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update initialization',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Initialization $initialization) {
        try {
            $initialization->delete();
            $now = date('YmdHis');
            Log::info('Initialization deleted successfully');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'init' => $initialization
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to delete initialization');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete initialization',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
