<?php

namespace App\Http\Controllers;

use App\Models\AddSale;
use App\Models\Item;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\StockUpdateByInvoiceNo;
use Illuminate\Support\Facades\Validator;

class StockUpdateByInvoiceNoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'InvoiceNo' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()->all()
                ], 400);
            }

            $sale = AddSale::find($data['InvoiceNo']);
            $saleItems = $sale->addSaleItemList;

            if (!$sale) {
                return response()->json([
                    'message' => 'Sale not found'
                ], 404);
            }

            if ($sale->isStockIOUpdate == 1) {
                return response()->json([
                    'message' => 'Stock already updated'
                ], 400);
            }

            Log::info('Sale Items found');
            Log::info($saleItems);

            if (count($saleItems) == 0) {
                return response()->json([
                    'message' => 'No Sale Items found'
                ], 404);
            }

            foreach ($saleItems as $saleItem) {
                $stockItem = Item::where('itemCode', $saleItem->itemCode)->first();
                Log::info('Stock Item found');
                Log::info($stockItem);

                $stockItem->quantity = $stockItem->quantity - $saleItem->quantity;
                $stockItem->packageQuantity = $stockItem->packageQuantity - $saleItem->packageQuantity;

                $stockItem->save();
            }

            $sale->isStockIOUpdate = 1;
            $sale->stockReleseDate = date('YmdHis');
            $sale->save();



            return response()->json([
                'message' => 'Stock updated successfully'
            ]);

        } catch (Exception $e) {
            Log::error('Failed to Update Stock By InvoiceNo !!');
            
            Log::error($e);
            
            return response()->json([
                'message' => 'Failed to Update Stock By InvoiceNo !',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}