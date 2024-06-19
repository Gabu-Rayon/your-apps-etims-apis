<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MappedPurchase;
use App\Models\MappedPurchaseItemList;

class MapPurchaseSearchByDateController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Retrieve the date from the request
            $date = $request->query('date');

            // Validate the date format
            if ($date && !preg_match('/^\d{14}$/', $date)) {
                return response()->json([
                    'message' => 'Invalid date format. Use yyyymmddhis format.'
                ], 400);
            }

            // Convert the date to a Carbon instance
            $date = $date ? Carbon::createFromFormat('YmdHis', $date) : null;

            // Retrieve the Mapped Purchase items with their associated items
            $mappedPurchaseData = MappedPurchase::with('items')->when($date, function ($query, $date) {
                return $query->where('created_at', '>=', $date);
            })->get();

            $now = date('YmdHis');

            // Prepare the response data
            $responseData = [
                'statusCode' => 200,
                'message' => 'Success',
                'data' => [
                    'resultCd' => '000',
                    'resultMsg' => 'Successful',
                    'resultDt' => $now,
                    'data' => [
                        'saleList' => $mappedPurchaseData->map(function ($mappedPurchaseList) {
                            return [
                                "id" => $mappedPurchaseList->id,
                                "invcNo" => $mappedPurchaseList->invcNo,
                                "orgInvcNo" => $mappedPurchaseList->orgInvcNo,
                                "supplrTin" => $mappedPurchaseList->supplrTin,
                                "supplrBhfId" => $mappedPurchaseList->supplrBhfId,
                                "supplrName" => $mappedPurchaseList->supplrName,
                                "supplrInvcNo" => $mappedPurchaseList->supplierInvcNo,
                                "purchaseTypeCode" => $mappedPurchaseList->purchaseTypeCode,
                                "rceiptTyCd" => $mappedPurchaseList->rceiptTyCd,
                                "paymentTypeCode" => $mappedPurchaseList->paymentTypeCode,
                                "purchaseSttsCd" => $mappedPurchaseList->purchaseSttsCd,
                                "confirmDate" => $mappedPurchaseList->confirmDate,
                                "purchaseDate" => $mappedPurchaseList->purchaseDate,
                                "warehouseDt" => $mappedPurchaseList->warehouseDt,
                                "cnclReqDt" => $mappedPurchaseList->cnclReqDt,
                                "cnclDt" => $mappedPurchaseList->cnclDt,
                                "refundDate" => $mappedPurchaseList->refundDate,
                                "totItemCnt" => $mappedPurchaseList->totItemCnt,
                                "taxblAmtA" => $mappedPurchaseList->taxblAmtA,
                                "taxblAmtB" => $mappedPurchaseList->taxblAmtB,
                                "taxblAmtC" => $mappedPurchaseList->taxblAmtC,
                                "taxblAmtD" => $mappedPurchaseList->taxblAmtD,
                                "taxRtA" => $mappedPurchaseList->taxRtA,
                                "taxRtB" => $mappedPurchaseList->taxRtB,
                                "taxRtC" => $mappedPurchaseList->taxRtC,
                                "taxRtD" => $mappedPurchaseList->taxRtD,
                                "taxAmtA" => $mappedPurchaseList->taxAmtA,
                                "taxAmtB" => $mappedPurchaseList->taxAmtB,
                                "taxAmtC" => $mappedPurchaseList->taxAmtC,
                                "taxAmtD" => $mappedPurchaseList->taxAmtC,
                                "totTaxblAmt" => $mappedPurchaseList->totTaxblAmt,
                                "totTaxAmt" => $mappedPurchaseList->totTaxAmt,
                                "totAmt" => $mappedPurchaseList->totAmt,
                                "remark" => $mappedPurchaseList->remark,
                                "resultDt" => $mappedPurchaseList->resultDt,
                                "createdDate" => $mappedPurchaseList->createdDate,
                                "isUpload" => $mappedPurchaseList->isUpload,
                                "isStockIOUpdate" => $mappedPurchaseList->isStockIOUpdate,
                                "isClientStockUpdate" => $mappedPurchaseList->isClientStockUpdate,
                                'mapPurchaseItemList' => $mappedPurchaseList->items->map(function ($item) {
                                    return [
                                        "id" => $item->id,
                                        'itemSeq' => $item->itemSeq,
                                        "itemCd" => $item->itemCd,
                                        "itemClsCd" => $item->itemClsCd,
                                        "itemNmme" => $item->itemNmme,
                                        "bcd" => $item->bcd,
                                        "supplrItemClsCd" => $item->supplrItemClsCd,
                                        "supplrItemCd" => $item->supplrItemCd,
                                        "supplrItemNm" => $item->supplrItemNm,
                                        "pkgUnitCd" => $item->pkgUnitCd,
                                        "pkg" => $item->pkg,
                                        "qtyUnitCd" => $item->qtyUnitCd,
                                        "qty" => $item->qty,
                                        "unitprice" => $item->unitprice,
                                        "supplyAmt" => $item->supplyAmt,
                                        "discountRate" => $item->discountRate,
                                        "discountAmt" => $item->discountAmt,
                                        "taxblAmt" => $item->taxblAmt,
                                        "taxTyCd" => $item->taxTyCd,
                                        "taxAmt" => $item->taxAmt,
                                        "totAmt" => $item->totAmt,
                                        "itemExprDt" => $item->itemExprDt,
                                    ];
                                }),
                            ];
                        }),
                    ],
                ],
            ];
            return response()->json($responseData, 200);
        } catch (Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'message' => 'An error occurred while retrieving Mapped Purchase List/s',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}