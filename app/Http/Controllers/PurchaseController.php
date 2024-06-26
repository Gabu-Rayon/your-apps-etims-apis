<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return response()->json($purchases);
    }

    public function show($id)
    {
        $purchases = Purchase::find($id);
        return response()->json($purchases);
    }


    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'supplierTin' => 'required|string',
                'supplierBhfId' => 'required|string',
                'supplierName' => 'required|string',
                'supplierInvcNo' => 'required|string',
                'purchTypeCode' => 'required|string',
                'purchStatusCode' => 'required|string',
                'pmtTypeCode' => 'required|string',
                'purchDate' => 'required|date',
                'occurredDate' => 'required|date',
                'confirmDate' => 'required|date',
                'warehouseDate' => 'required|date',
                'remark' => 'string',
                'mapping' => 'string',
                'itemsDataList' => 'required|array',
                'itemsDataList.*.itemCode' => 'required|string',
                'itemsDataList.*.supplrItemClsCode' => 'required|string',
                'itemsDataList.*.supplrItemCode' => 'required|string',
                'itemsDataList.*.supplrItemName' => 'required|string',
                'itemsDataList.*.quantity' => 'required|numeric',
                'itemsDataList.*.unitPrice' => 'required|numeric',
                'itemsDataList.*.pkgQuantity' => 'required|numeric',
                'itemsDataList.*.discountRate' => 'required|numeric',
                'itemsDataList.*.discountAmt' => 'required|numeric',
                'itemsDataList.*.itemExprDt' => 'required|date',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data');
            Log::info($data);

            $purchase = Purchase::create($data);
            $now = Carbon::now();

            foreach ($data['itemsDataList'] as $item) {
                $purchaseItem = new PurchaseItem([
                    'purchase_id' => $purchase->id,
                    'itemCode' => $item['itemCode'],
                    'supplrItemClsCode' => $item['supplrItemClsCode'],
                    'supplrItemCode' => $item['supplrItemCode'],
                    'supplrItemName' => $item['supplrItemName'],
                    'quantity' => $item['quantity'],
                    'unitPrice' => $item['unitPrice'],
                    'pkgQuantity' => $item['pkgQuantity'],
                    'discountRate' => $item['discountRate'],
                    'discountAmt' => $item['discountAmt'],
                    'itemExprDt' => $item['itemExprDt'],
                ]);
                $purchaseItem->save();
            }

            // foreach ($data['itemsDataList'] as $item) {
            //     $purchase->purchaseItems()->create($item);
            // }

            // Reload the purchase with its items
            $purchase = Purchase::with('purchaseItems')->find($purchase->id);


            Log::info('New Purchase and Purchase Items created successfully');
            Log::info($purchase);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'supplierTin' => $purchase->supplierTin,
                        'supplierBhfId' => $purchase->supplierBhfId,
                        'supplierName' => $purchase->supplierName,
                        'supplierInvcNo' => $purchase->supplierInvcNo,
                        'purchTypeCode' => $purchase->purchTypeCode,
                        'purchStatusCode' => $purchase->purchStatusCode,
                        'pmtTypeCode' => $purchase->pmtTypeCode,
                        'purchDate' => $purchase->purchDate,
                        'occurredDate' => $purchase->occurredDate,
                        'confirmDate' => $purchase->confirmDate,
                        'warehouseDate' => $purchase->warehouseDate,
                        'remark' => $purchase->remark,
                        'mapping' => $purchase->mapping,
                        'itemsDataList' => $purchase->purchaseItems->map(function ($item) {
                            return [
                                'itemCode' => $item->itemCode,
                                'supplrItemClsCode' => $item->supplrItemClsCode,
                                'supplrItemCode' => $item->supplrItemCode,
                                'supplrItemName' => $item->supplrItemName,
                                'quantity' => $item->quantity,
                                'unitPrice' => $item->unitPrice,
                                'pkgQuantity' => $item->pkgQuantity,
                                'discountRate' => $item->discountRate,
                                'discountAmt' => $item->discountAmt,
                                'itemExprDt' => $item->itemExprDt,
                            ];
                        })->toArray(),
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create Purchase and PurchaseItems');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Purchase and PurchaseItems',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $purchases = Purchase::find($id);
        $purchases->update($request->all());
        return response()->json($purchases, 200);
    }

    public function destroy($id)
    {
        Purchase::destroy($id);
        return response()->json(null, 204);
    }
}