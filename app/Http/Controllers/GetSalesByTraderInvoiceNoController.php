<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\GetSalesByTraderInvoiceNo;

class GetSalesByTraderInvoiceNoController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $traderInvoiceNo
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        try {
            // Retrieve the traderInvoiceNo from the request
            $traderInvoiceNo = $request->query('traderInvoiceNo');

            // Fetch the traderInvoiceNo by its invoice number
            $traderInvoiceNo = GetSalesByTraderInvoiceNo::where('trderInvoiceNo', $traderInvoiceNo)->first();

            $now = date('YmdHis');
            // Check if the traderInvoiceNo exists
            if (!$traderInvoiceNo) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sales Trader Invoice No not found !',
                ], 404);
            }

            return response()->json([
                'statusCode' => 200,
                'message' => 'Sales retrieved successfully',
                'data' => $traderInvoiceNo
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occurred while retrieving Sales Trader Invoice No',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}