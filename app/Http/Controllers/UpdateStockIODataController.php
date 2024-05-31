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

            $validator = Validator::make($data, [
                'storeReleaseTypeCode' => 'required|string',
                'remark' => 'required|string',
                'StockItemList' => 'required|array',
                'StockItemList.*.itemCode' => 'required|string',
                'StockItemList.*.packageQuantity' => 'required|numeric',
                'StockItemList.*.quantity' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 400);
            }

            Log::info('Request data', $data);

            $updateStockIOData = UpdateStockIOData::create([
                'storeReleaseTypeCode' => $data['storeReleaseTypeCode'],
                'remark' => $data['remark']
            ]);

            foreach ($data['StockItemList'] as $item) {
                $updateStockIODataItemList = new UpdateStockIODataItemList([
                    'update_stock_io_data_id' => $updateStockIOData->id,
                    'itemCode' => $item['itemCode'],
                    'packageQuantity' => $item['packageQuantity'],
                    'quantity' => $item['quantity'],
                ]);
                $updateStockIODataItemList->save();
            }

            $updateStockIOData = UpdateStockIOData::with('updateStockIODataItemList')->find($updateStockIOData->id);

            Log::info('New Update Stock IO Data Item List Items created successfully', $updateStockIOData->toArray());

            $now = Carbon::now();

            return response()->json([
                'message' => 'success',
                'data' => [
                    'resultCd' => '000',
                    'resultMsg' => 'Successful',
                    'resultDt' => $now,
                    'data' => [
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
            Log::error('Failed to Update Stock IO Data Item List Items', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Failed to Update Stock IO Data Item List Items',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}