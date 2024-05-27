<?php

namespace App\Http\Controllers;

use App\Models\ItemClassification;
use Illuminate\Http\Request;

class ItemClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemClassification = ItemClassification::all();
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successfull",
                    "resultDt" => $now,
                    "data" => [
                        'itemClsList' => $itemClassification
                    ]
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving item classification list',
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemClassification $itemClassification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemClassification $itemClassification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemClassification $itemClassification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemClassification $itemClassification)
    {
        //
    }
}
