<?php

namespace App\Http\Controllers;

use App\Models\ItemOpeningStock;
use Illuminate\Http\Request;

class ItemOpeningStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $itemOpeningStocks = ItemOpeningStock::all();
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemOpeningStockLst' => $itemOpeningStocks
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get Item Opening Stocks',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(ItemOpeningStock $itemOpeningStock) {
        try {
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemOpeningStock' => $itemOpeningStock
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get Item Opening Stock',
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

            $createdItemOpeningStocks = [];

            foreach ($data["openingItemsLists"] as $itemOpeningStock) {
                $itemOpngStck = ItemOpeningStock::create($itemOpeningStock);

                array_push($createdItemOpeningStocks, $itemOpngStck);
            }

            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'openingItemsLists' => $createdItemOpeningStocks
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create Item Opening Stock',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemOpeningStock $itemOpeningStock) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $itemOpeningStock->itemCode = $data['itemCode'];
            $itemOpeningStock->openingStock = $data['openingStock'];
            $itemOpeningStock->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemOpeningStock' => $itemOpeningStock
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update Item Opening Stock',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemOpeningStock $itemOpeningStock) {
        try {
            $itemOpeningStock->delete();
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemOpeningStock' => $itemOpeningStock
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete Item Opening Stock',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
