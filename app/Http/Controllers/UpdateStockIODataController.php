<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\UpdateStockIOData;
use Illuminate\Support\Facades\Log;
use App\Models\UpdateStockIODataItemList;
use Illuminate\Support\Facades\Validator;

class UpdateStockIODataController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'storeReleaseTypeCode' => 'required|string',
                'remark' => 'required|string',
                
                'StockItemList' => 'required|array',                
                'StockItemList.*.itemCode' => 'required|string',
                'StockItemList.*.packageQuantity' => 'required|string',
                'StockItemList.*.quantity' => 'required|string',
                
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data');
            Log::info($data);

            $updateStockIOData = UpdateStockIOData::create($data);
            $now = Carbon::now();

            foreach ($data['StockItemList'] as $item) {
                $updateStockIODataItemList = new UpdateStockIODataItemList([
                    'update_stock_IO_data_id' => $updateStockIOData->id,
                    'packageQuantity' => $item['packageQuantity'],
                    'quantity' => $item['quantity'],
                ]);
                $updateStockIODataItemList->save();
            }

            // foreach ($data['updateStockIODataItemList'] as $item) {
            //     $purchase->updateStockIODataItemList()->create($item);
            // }

            // Reload the purchase with its items
            $updateStockIOData = UpdateStockIOData::with('updateStockIODataItemList')->find($updateStockIOData->id);


            Log::info('New Update Stock IO Data Item List Items created successfully');
            Log::info($updateStockIOData);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'storeReleaseTypeCode' => $updateStockIOData->storeReleaseTypeCode,
                        'remark' => $updateStockIOData->remark,
                                                
                        'StockItemList' => $updateStockIOData->updateStockIODataItemList->map(function ($item) {
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
            Log::error('Failed to Update Stock IO Data Item List Items !!');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to Update Stock IO Data Item List Items ! !',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}