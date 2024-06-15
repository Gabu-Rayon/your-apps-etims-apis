<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        try {
            $date = $request->query('date');

            if (!$date) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'date is required'
                ], 400);
            }

            if (!preg_match('/^\d{14}$/', $date)) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'date format is incorrect'
                ], 400);
            }

            $branches = Branch::where('created_at', '>=', $date)->get();

            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'branches' => $branches
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get branches');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get branches',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(Branch $branch) {
        try {
            $now = date('YmdHis');
            Log::info('Branch retrieved successfully');
            Log::info($branch);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'branch' => $branch
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get branch');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get branch',
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
            $now = date('YmdHis');

            $branch = new Branch();
            $branch->tin = $data['tin'];
            $branch->bhfId = $data['bhfId'];
            $branch->bhfNm = $data['bhfNm'];
            $branch->bhfSttsCd = $data['bhfSttsCd'];
            $branch->prvncNm = $data['prvncNm'];
            $branch->dstrtNm = $data['dstrtNm'];
            $branch->sctrNm = $data['sctrNm'];
            $branch->locDesc = $data['locDesc'];
            $branch->mgrNm = $data['mgrNm'];
            $branch->mgrTelNo = $data['mgrTelNo'];
            $branch->mgrEmail = $data['mgrEmail'];
            $branch->hqYn = $data['hqYn'];
            $branch->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'branch' => $branch
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create branch');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create branch',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Branch $branch) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $branch->branchNo = $data['branchNo'];
            $branch->branchName = $data['branchName'];
            $branch->branchTel = $data['branchTel'];
            $branch->branchAddr = $data['branchAddr'];
            $branch->branchManager = $data['branchManager'];
            $branch->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'branch' => $branch
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update branch');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update branch',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Branch $branch) {
        try {
            $branch->delete();
            $now = date('YmdHis');
            Log::info('Branch deleted successfully');
            Log::info($branch);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'branch' => $branch
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to delete branch');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete branch',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
