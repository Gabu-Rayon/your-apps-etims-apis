<?php

namespace App\Http\Controllers;

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

            $updateStatus = UpdateMapPurchaseStatus::updateOrCreate(
                ['invoiceNo' => $data['invoiceNo']],
                ['isUpdate' => $data['isUpdate']]
            );

            $now = Carbon::now();

            Log::info('Mapped Purchase status updated successfully !');
            Log::info($updateStatus);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'invoiceNo' => $updateStatus->invoiceNo,
                        'isUpdate' => $updateStatus->isUpdate,
                    ]
                ]
            ]);
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