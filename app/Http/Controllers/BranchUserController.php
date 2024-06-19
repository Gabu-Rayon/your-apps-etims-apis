<?php

namespace App\Http\Controllers;

use App\Models\BranchUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class BranchUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index() {
        try {
       
            $branchUsers = BranchUser::all();
            $now = date('YmdHis');

            Log::info('Branch Users retrieved successfully');
            Log::info($branchUsers);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'bhfUsrsLst' => $branchUsers
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get Branch Users');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get Branch Users',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(BranchUser $branchUser) {
        try {
            $now = date('YmdHis');
        
            Log::info('Branch User retrieved successfully');
            Log::info($branchUser);
        
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'bhfUsr' => $branchUser
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get Branch User');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get Branch User',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    
    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request) {
        try {
            $data = $request->all();
        
            $validator = Validator::make($request->all(), [
                'branchUserId' => 'required|min:1|max:20',
                'branchUserName' => 'required|min:1|max:60',
                'password' => 'required|min:1|max:100',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }
        
            Log::info('Request data');
            Log::info($data);
        
            $branchUser = BranchUser::create($data);
            $now = date('YmdHis');
            
            Log::info('Branch User created successfully');
            Log::info($branchUser);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'bhfUsr' => $branchUser
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create Branch User');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Branch User',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, BranchUser $branchUser) {
        try {
            $data = $request->all();
            $now = date('YmdHis');
        
            $branchUser->branchUserId = $data['branchUserId'];
            $branchUser->branchUserName = $data['branchUserName'];
            $branchUser->password = $data['password'];
            $branchUser->save();
        
            Log::info('Branch User updated successfully');
            Log::info($branchUser);
        
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'bhfUsr' => $branchUser
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update Branch User');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update Branch User',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(BranchUser $branchUser) {
        try {
            $branchUser->delete();
            $now = date('YmdHis');
        
            Log::info('Branch User deleted successfully');
            Log::info($branchUser);
        
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'bhfUsr' => $branchUser
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to delete Branch User');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete Branch User',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
