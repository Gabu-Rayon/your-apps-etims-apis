<?php

namespace App\Http\Controllers;

use App\Models\StockMoveItem;
use App\Models\StockMoveList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StockMoveListController extends Controller
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

            $stockList = StockMoveList::where('created_at', '>=', $date)->get();

            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'stockList' => $stockList
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get Stock Move List');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get Stock Move List',
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
            $items = $data['itemList'];

            $now = date('YmdHis');

            $totTaxblAmt = 0;
            $totTaxAmt = 0;
            $totAmt = 0;

            foreach ($items as $item) {
                $totTaxblAmt += $item['taxblAmt'];
                $totTaxAmt += $item['taxAmt'];
                $totAmt += $item['totAmt'];
            }

            $stockMove = new StockMoveList();
            $stockMove->custTin = $data['custTin'];
            $stockMove->custBhfId = $data['custBhfId'];
            $stockMove->sarNo = $data['sarNo'];
            $stockMove->ocrnDt = $data['ocrnDt'];
            $stockMove->totItemCnt = count($items);
            $stockMove->totTaxblAmt = $totTaxblAmt;
            $stockMove->totTaxAmt = $totTaxAmt;
            $stockMove->totAmt = $totAmt;
            $stockMove->remark = $data['remark'];
            $stockMove->save();

            foreach ($items as $item) {
                StockMoveItem::create([
                    'stockMoveId' => $stockMove->id,
                    'itemSeq' => $item['itemSeq'],
                    'itemCd' => $item['itemCd'],
                    'itemClsCd' => $item['itemClsCd'],
                    'itemNm' => $item['itemNm'],
                    'bcd' => $item['bcd'],
                    'pkgUnitCd' => $item['pkgUnitCd'],
                    'pkg' => $item['pkg'],
                    'qtyUnitCd' => $item['qtyUnitCd'],
                    'qty' => $item['qty'],
                    'itemExprDt' => $item['itemExprDt'],
                    'prc' => $item['prc'],
                    'splyAmt' => $item['splyAmt'],
                    'totDcAmt' => $item['totDcAmt'],
                    'taxblAmt' => $item['taxblAmt'],
                    'taxTyCd' => $item['taxTyCd'],
                    'taxAmt' => $item['taxAmt'],
                    'totAmt' => $item['totAmt']
                ]);
            }

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'stockMove' => $stockMove
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create Stock Move');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Stock Move',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StockMoveList $stockList)
    {
        try {
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'stockMove' => $stockList
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get Stock Move',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockMoveList $stockList) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $stockList->custTin = $data['custTin'];
            $stockList->custBhfId = $data['custBhfId'];
            $stockList->sarNo = $data['sarNo'];
            $stockList->ocrnDt = $data['ocrnDt'];
            $stockList->totItemCnt = count($data['itemList']);
            $stockList->totTaxblAmt = $data['totTaxblAmt'];
            $stockList->totTaxAmt = $data['totTaxAmt'];
            $stockList->totAmt = $data['totAmt'];
            $stockList->remark = $data['remark'];
            $stockList->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'stockMove' => $stockList
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update Stock Move');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update Stock Move',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockMoveList $stockList) {
        try {
            $now = date('YmdHis');
            $stockList->delete();
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'stockMove' => $stockList
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to delete Stock Move');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete Stock Move',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
