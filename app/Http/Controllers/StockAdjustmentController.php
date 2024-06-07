<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\StockAdjustment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\StockAdjustmentItemList;

class StockAdjustmentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            // Validate the request data
            $validator = Validator::make($data, [
                'storeReleaseTypeCode' => 'required|string',
                'remark' => 'nullable|string',
                'stockItemList' => 'required|array',
                'stockItemList.*.itemCode' => 'required|string',
                'stockItemList.*.packageQuantity' => 'required|integer',
                'stockItemList.*.quantity' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            // Log request data for debugging
            Log::info('Request data', $data);

            // Create StockAdjustment
            $stockAdjustment = StockAdjustment::create([
                'storeReleaseTypeCode' => $data['storeReleaseTypeCode'],
                'remark' => $data['remark'],
            ]);

            // Create related StockAdjustmentItemList entries
            foreach ($data['stockItemList'] as $item) {
                $stockAdjustment->items()->create([
                    'itemCode' => $item['itemCode'],
                    'packageQuantity' => $item['packageQuantity'],
                    'quantity' => $item['quantity'],
                ]);
            }

            // Fetch the newly created StockAdjustment with related items
            $stockAdjustment = StockAdjustment::with('items')->find($stockAdjustment->id);

            // Log success
            Log::info('New Stock Adjustment Added successfully', ['stockAdjustment' => $stockAdjustment]);

            // Prepare and return response
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => Carbon::now(),
                    "data" => [
                        'storeReleaseTypeCode' => $stockAdjustment->storeReleaseTypeCode,
                        'remark' => $stockAdjustment->remark,
                        'stockItemList' => $stockAdjustment->items->map(function ($item) {
                            return [
                                'itemCode' => $item->itemCode,
                                'packageQuantity' => $item->packageQuantity,
                                'quantity' => $item->quantity,
                            ];
                        })->toArray(),
                    ]
                ]
            ]);
        } catch (Exception $e) {
            // Log error
            Log::error('Failed to Add Stock Adjustment', ['error' => $e]);

            // Return error response
            return response()->json([
                'message' => 'Failed to Add Stock Adjustment',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}