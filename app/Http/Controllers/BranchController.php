<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Support\Facades\Log;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $branches = Branch::all();
            $now = date('YmdHis');
            Log::info('Branches retrieved successfully');
            Log::info($branches);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'bhfList' => $branches
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
}
