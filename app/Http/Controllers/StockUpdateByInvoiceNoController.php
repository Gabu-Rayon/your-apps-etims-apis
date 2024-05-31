<?php

namespace App\Http\Controllers;

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

            Log::info('Request data');
            Log::info($data);

            $stockUpdateByInvoiceNo  = StockUpdateByInvoiceNo::updateOrCreate(
                
                ['invoiceNo' => $data['invoiceNo']],
                
                ['isUpdate' => $data['isUpdate']]
            );

            $now = Carbon::now();

            Log::info('Stock Being Updated ByInvoiceNo :');
            Log::info($stockUpdateByInvoiceNo);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'invoiceNo' => $stockUpdateByInvoiceNo->invoiceNo,
                    ]
                ]
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