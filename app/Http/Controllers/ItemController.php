<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        try {
            $date = $request->query('date');

            if (!$date) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'date is required'
                ], 400);
            }

            if (!preg_match('/^\d{14}$/', $date)) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'date format is incorrect'
                ], 400);
            }

            $items = Item::where('created_at', '>=', $date)->get();

            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'items' => $items
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(Item $item) {
        try {
            $now = date('YmdHis');
            Log::info('Item retrieved successfully');
            Log::info($item);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'item' => $item
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get item',
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

        } catch (QueryException $e) {
            Log::error('Failed to create item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create item',
                'error' => $e->getMessage()
            ], 500);
        }
        
        catch (Exception $e) {
            Log::error('Failed to create item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create item',
                'error' => $e->getMessage()
            ], 500);
        }
        
        catch (Exception $e) {
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
    public function update(Request $request, Item $item) {
        try {
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                "itemCode" => "required|string|min:1",
                "itemClassifiCode" => "required|string|min:1",
                "itemTypeCode" => "required|string|in:1,2,3",
                "itemName" => "required|string|min:1",
                "countryCode" => "required|string|min:1",
                "pkgUnitCode" => "required|string|min:1",
                "qtyUnitCode" => "required|string|min:1",
                "taxTypeCode" => "required|string|min:1",
                "unitPrice" => "required|numeric|min:1",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            $item->update($data);

            $now = date('YmdHis');

            Log::info('Item updated successfully');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'item' => $item
                    ]
                ]
            ]);

        } catch (Exception $e) {
            Log::error('Failed to update item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item) {
        try {
            $item->delete();

            $now = date('YmdHis');

            Log::info('Item deleted successfully');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => null
                ]
            ]);

        } catch (Exception $e) {
            Log::error('Failed to delete item');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete item',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
