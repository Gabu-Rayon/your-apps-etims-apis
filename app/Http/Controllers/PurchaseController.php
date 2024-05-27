<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
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
                'PurchaseCode' => 'required|string|unique:Purchases|min:1|max:10',
                'PurchaseName' => 'required|string|min:1|max:100',
                'premiumRate' => 'required|numeric',
                'isUsed' => 'boolean',
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
            $now = date('YmdHis');

            Log::info('Purchase created successfully');
            Log::info($purchase);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'Purchase' => $purchase
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create Purchase');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Purchase',
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