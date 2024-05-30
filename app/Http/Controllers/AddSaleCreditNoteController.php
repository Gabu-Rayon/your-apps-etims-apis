<?php 

namespace App\Http\Controllers;

use Log;
use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AddSaleCreditNote;
use Illuminate\Support\Facades\Validator;
use App\Models\AddSaleCreditNoteItemsList;

class AddSaleCreditNoteController extends Controller
{
//    public function store(Request $request)
//     {
//         try {
//             $data = $request->all();

//             $validator = Validator::make($data, [
//                 'orgInvoiceNo' => 'required|integer',
//                 'customerTin' => 'required|string',
//                 'customerName' => 'required|string',
//                 'salesType' => 'required|string',
//                 'paymentType' => 'required|string',
//                 'creditNoteReason' => 'required|string',
//                 'creditNoteDate' => 'required|string',
//                 'traderInvoiceNo' => 'required|string',
//                 'confirmDate' => 'required|string',
//                 'salesDate' => 'required|string',
//                 'stockReleseDate' => 'required|string',
//                 'receiptPublishDate' => 'required|string',
//                 'occurredDate' => 'sometimes|string',
//                 'invoiceStatusCode' => 'required|string',
//                 'remark' => 'required|string',
//                 'isPurchaseAccept' => 'required|boolean',
//                 'isStockIOUpdate' => 'required|boolean',
//                 'mapping' => 'sometimes|string',

//                 'creditNoteItemsList' => 'required|array',
//                 'creditNoteItemsList.*.itemCode' => 'required|string',
//                 'creditNoteItemsList.*.itemClassCode' => 'required|string',
//                 'creditNoteItemsList.*.itemTypeCode' => 'required|string',
//                 'creditNoteItemsList.*.itemName' => 'required|string',
//                 'creditNoteItemsList.*.orgnNatCd' => 'required|string',
//                 'creditNoteItemsList.*.taxTypeCode' => 'required|string',
//                 'creditNoteItemsList.*.unitPrice' => 'required|numeric',
//                 'creditNoteItemsList.*.isrcAplcbYn' => 'required|string',
//                 'creditNoteItemsList.*.pkgUnitCode' => 'required|string',
//                 'creditNoteItemsList.*.pkgQuantity' => 'required|numeric',
//                 'creditNoteItemsList.*.qtyUnitCd' => 'required|string',
//                 'creditNoteItemsList.*.quantity' => 'required|numeric',
//                 'creditNoteItemsList.*.discountRate' => 'required|numeric',
//                 'creditNoteItemsList.*.discountAmt' => 'required|numeric',
//                 'creditNoteItemsList.*.itemExprDate' => 'required|string',
//             ]);

//             if ($validator->fails()) {
//                 return response()->json([
//                     'message' => 'Validation failed',
//                     'error' => $validator->errors()->all()
//                 ], 400);
//             }

//             Log::info('Request data: ', $data);

//             $addSaleCreditNote = AddSaleCreditNote::create($data);
//             $now = Carbon::now();

//             foreach ($data['creditNoteItemsList'] as $item) {
//                 $addcreditNoteItemsList = new AddSaleCreditNoteItemsList([
//                     'add_sale_credit_note_id' => $addSaleCreditNote->id,
//                     'itemCode' => $item['itemCode'],
//                     'itemClassCode' => $item['itemClassCode'],
//                     'itemTypeCode' => $item['itemTypeCode'],
//                     'itemName' => $item['itemName'],
//                     'orgnNatCd' => $item['orgnNatCd'],
//                     'taxTypeCode' => $item['taxTypeCode'],
//                     'unitPrice' => $item['unitPrice'],
//                     'isrcAplcbYn' => $item['isrcAplcbYn'],
//                     'pkgUnitCode' => $item['pkgUnitCode'],
//                     'pkgQuantity' => $item['pkgQuantity'],
//                     'qtyUnitCd' => $item['qtyUnitCd'],
//                     'quantity' => $item['quantity'],
//                     'discountRate' => $item['discountRate'],
//                     'discountAmt' => $item['discountAmt'],
//                     'itemExprDate' => $item['itemExprDate'],
//                 ]);
//                 $addcreditNoteItemsList->save();
//             }

//             $addSaleCreditNote = AddSaleCreditNote::with('creditNoteItemsList')->find($addSaleCreditNote->id);

//             Log::info('New Sale Credit Note and Sale Credit Items created successfully');
//             Log::info($addSaleCreditNote);

//             return response()->json([
//                 'message' => 'success',
//                 'data' => [
//                     "resultCd" => "000",
//                     "resultMsg" => "Successful",
//                     "resultDt" => $now,
//                     "data" => [
//                         'id' => $addSaleCreditNote->id,
//                         'orgInvoiceNo' => $addSaleCreditNote->orgInvoiceNo,
//                         'customerTin' => $addSaleCreditNote->customerTin,
//                         'customerName' => $addSaleCreditNote->customerName,
//                         'salesType' => $addSaleCreditNote->salesType,
//                         'paymentType' => $addSaleCreditNote->paymentType,
//                         'creditNoteReason' => $addSaleCreditNote->creditNoteReason,
//                         'creditNoteDate' => $addSaleCreditNote->creditNoteDate,
//                         'traderInvoiceNo' => $addSaleCreditNote->traderInvoiceNo,
//                         'confirmDate' => $addSaleCreditNote->confirmDate,
//                         'salesDate' => $addSaleCreditNote->salesDate,
//                         'stockReleseDate' => $addSaleCreditNote->stockReleseDate,
//                         'receiptPublishDate' => $addSaleCreditNote->receiptPublishDate,
//                         'occurredDate' => $addSaleCreditNote->occurredDate,
//                         'invoiceStatusCode' => $addSaleCreditNote->invoiceStatusCode,
//                         'remark' => $addSaleCreditNote->remark,
//                         'isStockIOUpdate' => $addSaleCreditNote->isStockIOUpdate,
//                         'mapping' => $addSaleCreditNote->mapping,

//                         'creditNoteItemsList' => $addSaleCreditNote->addSaleCreditNoteItemsList->map(function ($item) {
//                             return [
//                                 'id' => $item->id,
//                                 'add_sale_credit_note_id' => $item->add_sale_credit_note_id,
//                                 'itemCode' => $item->itemCode,
//                                 'itemClassCode' => $item->itemClassCode,
//                                 'itemTypeCode' => $item->itemTypeCode,
//                                 'itemName' => $item->itemName,
//                                 'orgnNatCd' => $item->orgnNatCd,
//                                 'taxTypeCode' => $item->taxTypeCode,
//                                 'unitPrice' => $item->unitPrice,
//                                 'isrcAplcbYn' => $item->isrcAplcbYn,
//                                 'pkgUnitCode' => $item->pkgUnitCode,
//                                 'pkgQuantity' => $item->pkgQuantity,
//                                 'qtyUnitCd' => $item->qtyUnitCd,
//                                 'quantity' => $item->quantity,
//                                 'discountRate' => $item->discountRate,
//                                 'discountAmt' => $item->discountAmt,
//                                 'itemExprDate' => $item->itemExprDate,
//                                 'created_at' => $item->created_at,
//                                 'updated_at' => $item->updated_at,
//                             ];
//                         })->toArray(),
//                     ]
//                 ]
//             ]);

//         } catch (Exception $e) {
//             Log::error('Failed to create Sale Credit Note and Sale Credit Items');
//             Log::error($e);
//             return response()->json([
//                 'message' => 'Failed to create Sale Credit Note and Sale Credit Items',
//                 'error' => $e->getMessage()
//             ], 500);
//         }
//     }


    public function store(Request $request)
    {
        try {
            $data = $request->all();

            // ... validation code ...
            $validator = Validator::make($data, [
                'orgInvoiceNo' => 'required|integer',
                'customerTin' => 'required|string',
                'customerName' => 'required|string',
                'salesType' => 'required|string',
                'paymentType' => 'required|string',
                'creditNoteReason' => 'required|string',
                'creditNoteDate' => 'required|string',
                'traderInvoiceNo' => 'required|string',
                'confirmDate' => 'required|string',
                'salesDate' => 'required|string',
                'stockReleseDate' => 'required|string',
                'receiptPublishDate' => 'required|string',
                'occurredDate' => 'sometimes|string',
                'invoiceStatusCode' => 'required|string',
                'remark' => 'required|string',
                'isPurchaseAccept' => 'required|boolean',
                'isStockIOUpdate' => 'required|boolean',
                'mapping' => 'sometimes|string',

                'creditNoteItemsList' => 'required|array',
                'creditNoteItemsList.*.itemCode' => 'required|string',
                'creditNoteItemsList.*.itemClassCode' => 'required|string',
                'creditNoteItemsList.*.itemTypeCode' => 'required|string',
                'creditNoteItemsList.*.itemName' => 'required|string',
                'creditNoteItemsList.*.orgnNatCd' => 'required|string',
                'creditNoteItemsList.*.taxTypeCode' => 'required|string',
                'creditNoteItemsList.*.unitPrice' => 'required|numeric',
                'creditNoteItemsList.*.isrcAplcbYn' => 'required|string',
                'creditNoteItemsList.*.pkgUnitCode' => 'required|string',
                'creditNoteItemsList.*.pkgQuantity' => 'required|numeric',
                'creditNoteItemsList.*.qtyUnitCd' => 'required|string',
                'creditNoteItemsList.*.quantity' => 'required|numeric',
                'creditNoteItemsList.*.discountRate' => 'required|numeric',
                'creditNoteItemsList.*.discountAmt' => 'required|numeric',
                'creditNoteItemsList.*.itemExprDate' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data: ', $data);

            $addSaleCreditNote = AddSaleCreditNote::create($data);
            $now = Carbon::now();

            foreach ($data['creditNoteItemsList'] as $item) {
                $addcreditNoteItemsList = new AddSaleCreditNoteItemsList([
                    'add_sale_credit_note_id' => $addSaleCreditNote->id,
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
                $addcreditNoteItemsList->save();
            }

            $addSaleCreditNote = AddSaleCreditNote::with('addSaleCreditNoteItemsList')->find($addSaleCreditNote->id);

            // ... response code ...


            Log::info('New Sale Credit Note and Sale Credit Items created successfully');
            Log::info($addSaleCreditNote);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'id' => $addSaleCreditNote->id,
                        'orgInvoiceNo' => $addSaleCreditNote->orgInvoiceNo,
                        'customerTin' => $addSaleCreditNote->customerTin,
                        'customerName' => $addSaleCreditNote->customerName,
                        'salesType' => $addSaleCreditNote->salesType,
                        'paymentType' => $addSaleCreditNote->paymentType,
                        'creditNoteReason' => $addSaleCreditNote->creditNoteReason,
                        'creditNoteDate' => $addSaleCreditNote->creditNoteDate,
                        'traderInvoiceNo' => $addSaleCreditNote->traderInvoiceNo,
                        'confirmDate' => $addSaleCreditNote->confirmDate,
                        'salesDate' => $addSaleCreditNote->salesDate,
                        'stockReleseDate' => $addSaleCreditNote->stockReleseDate,
                        'receiptPublishDate' => $addSaleCreditNote->receiptPublishDate,
                        'occurredDate' => $addSaleCreditNote->occurredDate,
                        'invoiceStatusCode' => $addSaleCreditNote->invoiceStatusCode,
                        'remark' => $addSaleCreditNote->remark,
                        'isStockIOUpdate' => $addSaleCreditNote->isStockIOUpdate,
                        'mapping' => $addSaleCreditNote->mapping,

                         'creditNoteItemsList' => $addSaleCreditNote->creditNoteItemsList->map(function ($item) {
                            return [
                                'id' => $item->id,
                                'add_sale_credit_note_id' => $item->add_sale_credit_note_id,
                                'itemCode' => $item->itemCode,
                                'itemClassCode' => $item->itemClassCode,
                                'itemTypeCode' => $item->itemTypeCode,
                                'itemName' => $item->itemName,
                                'orgnNatCd' => $item->orgnNatCd,
                                'taxTypeCode' => $item->taxTypeCode,
                                'unitPrice' => $item->unitPrice,
                                'isrcAplcbYn' => $item->isrcAplcbYn,
                                'pkgUnitCode' => $item->pkgUnitCode,
                                'pkgQuantity' => $item->pkgQuantity,
                                'qtyUnitCd' => $item->qtyUnitCd,
                                'quantity' => $item->quantity,
                                'discountRate' => $item->discountRate,
                                'discountAmt' => $item->discountAmt,
                                'itemExprDate' => $item->itemExprDate,
                                'created_at' => $item->created_at,
                                'updated_at' => $item->updated_at,
                            ];
                        })->toArray(),
                    ]
                ]
            ]);
            
        } catch (Exception $e) {
            // ... error handling code ...
            Log::error('Failed to create Sale Credit Note and Sale Credit Items');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Sale Credit Note and Sale Credit Items',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}