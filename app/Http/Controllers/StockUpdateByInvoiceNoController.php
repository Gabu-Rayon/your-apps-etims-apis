<?php

namespace App\Http\Controllers;

use App\Models\AddSale;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StockUpdateByInvoiceNoController extends Controller
{
    public function store (Request $request) {
        try {

            $invoiceNo = $request->query('invoiceNo');

            if (!$invoiceNo) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'invoiceNo is required'
                ], 400);
            }

            $sale = AddSale::where('traderInvoiceNo', $invoiceNo)->first();

            if (!$sale) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'Sale Details not found'
                ], 400);
            }

            $saleItems = $sale->addSaleItemList;

            foreach ($saleItems as $saleItem) {
                $item = Item::where('itemCode', $saleItem->itemCode)->first();

                if ($item) {
                    $item->quantity = $item->quantity - $saleItem->quantity;
                    $item->packageQuantity = $item->packageQuantity - $saleItem->pkgQuantity;
                    $item->save();
                } else {
                    return response()->json([
                        'message' => 'Validation failed',
                        'error' => 'Item not found'
                    ], 400);
                }
            }

            return response()->json([
                'message' => 'Stock updated successfully'
            ], 200);
        } catch (Exception $e) {
            Log::error('Failed to update stock by invoice no');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update stock by invoice no',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}