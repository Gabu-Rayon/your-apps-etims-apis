<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Exception;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\UpdateMapPurchaseStatus;
use Illuminate\Support\Facades\Validator;

class UpdateMapPurchaseStatusController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'invoiceNo' => 'required|integer',
                'isUpdate' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data');
            Log::info($data);

            $purchaseToUpdate = Purchase::where('supplierInvcNo', $data['invoiceNo'])
                ->first();

            if (!$purchaseToUpdate) {
                return response()->json([
                    'message' => 'Purchase not found',
                    'error' => 'Purchase not found in the database'
                ], 404);
            }

            $purchaseToUpdate->mapping = $data['isUpdate'];

            $purchaseToUpdate->save();

            return response()->json([
                'statusCode' => 200,
                'message'=> 'Success',
                'data' => null
            ], 200);
        } catch (Exception $e) {
            Log::error('Failed to update Mapped purchase status ! ');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update Mapped purchase status !',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}