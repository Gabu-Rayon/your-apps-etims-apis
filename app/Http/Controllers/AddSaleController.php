<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AddSale;
use App\Models\AddSaleItemList;
use Exception;
use Log;
use Carbon\Carbon;

class AddSaleController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'customerNo' => 'required|string',
                'customerTin' => 'required|string',
                'customerName' => 'required|string',
                'customerMobileNo' => 'required|string',
                'salesType' => 'required|string',
                'paymentType' => 'required|string',
                'traderInvoiceNo' => 'required|string',
                'confirmDate' => 'required|date',
                'salesDate' => 'required|date',
                'stockReleseDate' => 'required|date',
                'receiptPublishDate' => 'required|date',
                'occurredDate' => 'required|date',
                'invoiceStatusCode' => 'required|string',
                'remark' => 'string',
                'isPurchaseAccept' => 'required|boolean',
                'isStockIOUpdate' => 'required|boolean',
                'mapping' => 'string',
                'saleItemList' => 'required|array',
                'saleItemList.*.itemCode' => 'required|string',
                'saleItemList.*.itemClassCode' => 'required|string',
                'saleItemList.*.itemTypeCode' => 'required|string',
                'saleItemList.*.itemName' => 'required|string',
                'saleItemList.*.orgnNatCd' => 'required|string',
                'saleItemList.*.taxTypeCode' => 'required|string',
                'saleItemList.*.unitPrice' => 'required|numeric',
                'saleItemList.*.isrcAplcbYn' => 'required|string',
                'saleItemList.*.pkgUnitCode' => 'required|string',
                'saleItemList.*.pkgQuantity' => 'required|numeric',
                'saleItemList.*.qtyUnitCd' => 'required|string',
                'saleItemList.*.quantity' => 'required|numeric',
                'saleItemList.*.discountRate' => 'required|numeric',
                'saleItemList.*.discountAmt' => 'required|numeric',
                'saleItemList.*.itemExprDate' => 'required|date',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data');
            Log::info($data);

            $addSale = AddSale::create($data);
            $now = Carbon::now();

            foreach ($data['saleItemList'] as $item) {
                $addSaleItem = new AddSaleItemList([
                    'add_sale_id' => $addSale->id,
                    'itemCode' => $item['itemCode'],
                    'itemClassCode' => $item['itemClassCode'],
                    'itemTypeCode' => $item['itemTypeCode'],
                    'itemName' => $item['itemName'],
                    'orgnNatCd' => $item['orgnNatCd'],
                    'taxTypeCode' => $item['taxTypeCode'],
                    'unitPrice' => $item['unitPrice'],
                    'isrcAplcbYn' => $item['isrcAplcbYn'],
                    'pkgUnitCode' => $item['pkgUnitCode'],
                    'pkgQuantity' => $item['pkgQuantity'],
                    'qtyUnitCd' => $item['qtyUnitCd'],
                    'quantity' => $item['quantity'],
                    'discountRate' => $item['discountRate'],
                    'discountAmt' => $item['discountAmt'],
                    'itemExprDate' => $item['itemExprDate'],
                ]);
                $addSaleItem->save();
            }

            $addSale = AddSale::with('addSaleItemList')->find($addSale->id);

            Log::info('New Sale and Sale Items created successfully');
            Log::info($addSale);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => $addSale
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create New Sale and Sale Items !');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create New Sale and Sale Items  !!!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}