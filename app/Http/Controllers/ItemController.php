<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $items = Item::all();
            $now = date('YmdHis');
            Log::info('Items retrieved successfully');
            Log::info($items);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemsList' => $items
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get items');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get items',
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
                'items' => 'required|array|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            $createdItems = [];
        
            foreach ($data['items'] as $item) {
                $validator = Validator::make($request->all(), [
                    'itemCode' => 'required|string|min:1',
                    'itemClassifiCode' => 'required|min:1|string',
                    'itemTypeCode' => 'required|min:1|string|in:1,2,3',
                    'itemName' => 'required|min:1|string',
                    'countryCode' => 'required|min:1|string',
                    'pkgUnitCode' => 'required|min:1|string',
                    'qtyUnitCode' => 'required|min:1|string',
                    'taxTypeCode' => 'required|min:1|string',
                    'unitPrice' => 'required|numeric',
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'message' => 'Validation failed',
                        'error' => $validator->errors()->all()
                    ], 400);
                }

                $item = Item::create($item);

                array_push($createdItems, $item);
            }

            $now = date('YmdHis');

            Log::info('Items created successfully');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemsList' => $createdItems
                    ]
                ]
            ]);

        } catch (Exception $e) {
            Log::error('Failed to add item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to add item',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
