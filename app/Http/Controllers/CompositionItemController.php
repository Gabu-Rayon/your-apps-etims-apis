<?php

namespace App\Http\Controllers;

use App\Models\CompositionItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompositionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $compositionItems = CompositionItem::all();
            $now = date('YmdHis');
            Log::info('Composition Items retrieved successfully');
            Log::info($compositionItems);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'compositionItems' => $compositionItems
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get Composition Items');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get Composition Items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            Log::info('Composition Item data');
            Log::info($data);
            $now = date('YmdHis');

            $compositionItems = [];
            
            foreach ($data["compositionItems"] as $compositionItemData) {
                $compositionItem = new CompositionItem();
                $compositionItem->mainItemCode = $data['mainItemCode'];
                $compositionItem->compoItemCode = $compositionItemData['compoItemCode'];
                $compositionItem->compoItemQty = $compositionItemData['compoItemQty'];
                $compositionItem->save();

                array_push($compositionItems, $compositionItem);
            }

            Log::info('Composition Items created successfully');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'compositionItems' => $compositionItems
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create Composition Item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Composition Item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, CompositionItem $compositionItem) {
        try {
            $data = $request->all();
            $now = date('YmdHis');
        
            $compositionItem->mainItemCode = $data['mainItemCode'];
            $compositionItem->compoItemCode = $data['compoItemCode'];
            $compositionItem->compoItemQty = $data['compoItemQty'];
            $compositionItem->save();
        
            Log::info('Composition Item updated successfully');
            Log::info($compositionItem);
        
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'compositionItem' => $compositionItem
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update Composition Item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update Composition Item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(CompositionItem $compositionItem) {
        try {
            $now = date('YmdHis');
            $compositionItem->delete();
            Log::info('Composition Item deleted successfully');
            Log::info($compositionItem);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'compositionItem' => $compositionItem
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to delete Composition Item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete Composition Item',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
