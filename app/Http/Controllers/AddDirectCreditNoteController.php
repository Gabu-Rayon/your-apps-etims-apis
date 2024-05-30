<?php

namespace App\Http\Controllers;

use App\Models\AddDirectCreditNote;
use App\Models\AddDirectCreditNoteItemsList;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AddDirectCreditNoteController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'orgInvoiceNo' => 'required|string',
                'traderInvoiceNo' => 'required|string',
                'salesType' => 'required|string',
                'paymentType' => 'required|string',
                'creditNoteDate' => 'required|date',
                'confirmDate' => 'required|date',
                'salesDate' => 'required|date',
                'stockReleseDate' => 'required|date',
                'receiptPublishDate' => 'required|date',
                'occurredDate' => 'required|date',
                'creditNoteReason' => 'required|string',
                'invoiceStatusCode' => 'nullable|string',
                'isPurchaseAccept' => 'required|boolean',
                'remark' => 'nullable|string',
                'isStockIOUpdate' => 'required|boolean',
                'mapping' => 'nullable|string',

                'directCreditNoteItemsList' => 'required|array',
                'directCreditNoteItemsList.*.itemCode' => 'required|string',
                'directCreditNoteItemsList.*.unitPrice' => 'required|numeric',
                'directCreditNoteItemsList.*.quantity' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data');
            Log::info($data);

            $addDirectCreditNote = AddDirectCreditNote::create($data);
            $now = Carbon::now();

            foreach ($data['directCreditNoteItemsList'] as $item) {
                $addDirectCreditNoteItem = new AddDirectCreditNoteItemsList([
                    'add_direct_credit_note_id' => $addDirectCreditNote->id,
                    'itemCode' => $item['itemCode'],
                    'unitPrice' => $item['unitPrice'],
                    'quantity' => $item['quantity'],
                ]);
                $addDirectCreditNoteItem->save();
            }

            $addDirectCreditNote = AddDirectCreditNote::with('addDirectCreditNoteItemsList')->find($addDirectCreditNote->id);

            Log::info('New Direct Credit Note and Items created successfully');
            Log::info($addDirectCreditNote);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'orgInvoiceNo' => $addDirectCreditNote->orgInvoiceNo,
                        'traderInvoiceNo' => $addDirectCreditNote->traderInvoiceNo,
                        'salesType' => $addDirectCreditNote->salesType,
                        'paymentType' => $addDirectCreditNote->paymentType,
                        'creditNoteDate' => $addDirectCreditNote->creditNoteDate,
                        'confirmDate' => $addDirectCreditNote->confirmDate,
                        'salesDate' => $addDirectCreditNote->salesDate,
                        'stockReleseDate' => $addDirectCreditNote->stockReleseDate,
                        'receiptPublishDate' => $addDirectCreditNote->receiptPublishDate,
                        'occurredDate' => $addDirectCreditNote->occurredDate,
                        'creditNoteReason' => $addDirectCreditNote->creditNoteReason,
                        'invoiceStatusCode' => $addDirectCreditNote->invoiceStatusCode,
                        'isPurchaseAccept' => $addDirectCreditNote->isPurchaseAccept,
                        'remark' => $addDirectCreditNote->remark,
                        'isStockIOUpdate' => $addDirectCreditNote->isStockIOUpdate,
                        'mapping' => $addDirectCreditNote->mapping,
                        'directCreditNoteItemsList' => $addDirectCreditNote->addDirectCreditNoteItemsList->map(function ($item) {
                            return [
                                'itemCode' => $item->itemCode,
                                'unitPrice' => $item->unitPrice,
                                'quantity' => $item->quantity,
                            ];
                        })->toArray(),
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to create New Direct Credit Note and Items');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create New Direct Credit Note and Items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}