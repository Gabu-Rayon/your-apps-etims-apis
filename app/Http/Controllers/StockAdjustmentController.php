<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockAdjustment;
use App\Models\StockAdjustmentItemList;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StockAdjustmentController extends Controller {

    public function index() {
        try {
            $stockAdjustments = StockAdjustment::all();
            $now = date('YmdHis');
            Log::info('Stock Adjustments retrieved successfully');
            Log::info($stockAdjustments);

            foreach ($stockAdjustments as $stockAdjustment) {
                $stockAdjustment['stockItemList'] = $stockAdjustment->items()->get();
            }
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'stockAdjustmentList' => $stockAdjustments
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get stock adjustments');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get stock adjustments',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store() {
        try {

            $data = request()->all();

            $validator = Validator::make($data, [
                'storeReleaseTypeCode' => 'required|string|min:1|',
                'remark' => 'string|min:1|nullable',
                'stockItemList' => 'required|array',
                'stockItemList.*.itemCode' => 'required|string|min:1',
                'items.*.quantity' => 'required|numeric',
                'items.*.packageQuantity' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()
                ], 400);
            }

            Log::info('Validated');

            $stockAdjustment = new StockAdjustment();
            $stockAdjustment->storeReleaseTypeCode = $data['storeReleaseTypeCode'];
            $stockAdjustment->remark = $data['remark'];
            $stockAdjustment->save();

            $stockItemList = [];

            foreach ($data['stockItemList'] as $stockItem) {
                $stockAdjustmentItem = new StockAdjustmentItemList();
                $stockAdjustmentItem->itemCode = $stockItem['itemCode'];
                $stockAdjustmentItem->quantity = $stockItem['quantity'];
                $stockAdjustmentItem->packageQuantity = $stockItem['packageQuantity'];
                $stockAdjustmentItem->stock_adjustment_id = $stockAdjustment->id;
                $stockAdjustmentItem->save();
                array_push($stockItemList, $stockAdjustmentItem);

                $item = Item::where('itemCode', $stockItem['itemCode'])->first();

                if ($item) {
                    $item->quantity = $item->quantity + $stockItem['quantity'];
                    $item->packageQuantity = $item->packageQuantity + $stockItem['packageQuantity'];
                    $item->save();
                } else {
                    return response()->json([
                        'message' => 'Item not found',
                        'error' => 'Item not found'
                    ], 404);
                }
            }

            $stockAdjustment['stockItemList'] = $stockItemList;

            Log::info('Stock adjustments created successfully');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => date('YmdHis'),
                    "data" => [
                        'stockAdjustment' => $stockAdjustment
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create stock adjustments');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create stock adjustments',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}