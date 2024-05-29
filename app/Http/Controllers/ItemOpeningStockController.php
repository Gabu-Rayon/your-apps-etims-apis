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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(ItemOpeningStock $itemOpeningStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemOpeningStock $itemOpeningStock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemOpeningStock $itemOpeningStock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemOpeningStock $itemOpeningStock)
    {
        //
    }
}
