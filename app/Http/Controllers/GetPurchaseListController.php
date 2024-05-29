<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use App\Models\GetPurchaseList;
use App\Models\GetPurchaseListItem;

class GetPurchaseListController extends Controller
{
    // public function index()
    // {
    //     try {
    //         $purchaseListData = GetPurchaseList::all();
    //         $now = date('YmdHis');
    //         return response()->json([
    //             'message' => 'success',
    //             'data' => [
    //                 "resultCd" => "000",
    //                 "resultMsg" => "Successful",
    //                 "resultDt" => $now,
    //                   'data' => [
    //                     'saleList' => $purchaseListData->map(function ($purchaseList) {
    //                         return [
    //                             'spplrTin' => $purchaseList->spplrTin,
    //                             'spplrNm' => $purchaseList->spplrNm,
    //                             'spplrBhfId' => $purchaseList->spplrBhfId,
    //                             'spplrInvcNo' => $purchaseList->spplrInvcNo,
    //                             'spplrSdcId' => $purchaseList->spplrSdcId,
    //                             'spplrMrcNo' => $purchaseList->spplrMrcNo,
    //                             'rcptTyCd' => $purchaseList->rcptTyCd,
    //                             'pmtTyCd' => $purchaseList->pmtTyCd,
    //                             'cfmDt' => $purchaseList->cfmDt,
    //                             'salesDt' => $purchaseList->salesDt,
    //                             'stockRlsDt' => $purchaseList->stockRlsDt,
    //                             'totItemCnt' => $purchaseList->totItemCnt,
    //                             'taxblAmtA' => $purchaseList->taxblAmtA,
    //                             'taxblAmtB' => $purchaseList->taxblAmtB,
    //                             'taxblAmtC' => $purchaseList->taxblAmtC,
    //                             'taxblAmtD' => $purchaseList->taxblAmtD,
    //                             'taxblAmtE' => $purchaseList->taxblAmtE,
    //                             'taxRtA' => $purchaseList->taxRtA,
    //                             'taxRtB' => $purchaseList->taxRtB,
    //                             'taxRtC' => $purchaseList->taxRtC,
    //                             'taxRtD' => $purchaseList->taxRtD,
    //                             'taxRtE' => $purchaseList->taxRtE,
    //                             'taxAmtA' => $purchaseList->taxAmtA,
    //                             'taxAmtB' => $purchaseList->taxAmtB,
    //                             'taxAmtC' => $purchaseList->taxAmtC,
    //                             'taxAmtD' => $purchaseList->taxAmtD,
    //                             'taxAmtE' => $purchaseList->taxAmtE,
    //                             'totTaxblAmt' => $purchaseList->totTaxblAmt,
    //                             'totTaxAmt' => $purchaseList->totTaxAmt,
    //                             'totAmt' => $purchaseList->totAmt,
    //                             'remark' => $purchaseList->remark,
    //                             'itemList' => $purchaseList->items->map(function ($item) {
    //                                 return [
    //                                     'itemSeq' => $item->itemSeq,
    //                                     'itemCd' => $item->itemCd,
    //                                     'itemClsCd' => $item->itemClsCd,
    //                                     'itemNm' => $item->itemNm,
    //                                     'pkgUnitCd' => $item->pkgUnitCd,
    //                                     'pkg' => $item->pkg,
    //                                     'qtyUnitCd' => $item->qtyUnitCd,
    //                                     'qty' => $item->qty,
    //                                     'prc' => $item->prc,
    //                                     'splyAmt' => $item->splyAmt,
    //                                     'dcRt' => $item->dcRt,
    //                                     'dcAmt' => $item->dcAmt,
    //                                     'taxTyCd' => $item->taxTyCd,
    //                                     'taxblAmt' => $item->taxblAmt,
    //                                     'taxAmt' => $item->taxAmt,
    //                                     'totAmt' => $item->totAmt,
    //                                     'itemExprDt' => $item->itemExprDt,
    //                                 ];
    //                             }),
    //                         ];
    //                     }),
    //                 ],
    //             ],
    //         ], 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => 'An error occurred while retrieving Purchase List/s',
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }

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

            // Retrieve the imported items with their associated items
            $purchaseListData = GetPurchaseList::with('items')->when($date, function ($query, $date) {
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
                        'saleList' => $purchaseListData->map(function ($purchaseList) {
                            return [
                                'spplrTin' => $purchaseList->spplrTin,
                                'spplrNm' => $purchaseList->spplrNm,
                                'spplrBhfId' => $purchaseList->spplrBhfId,
                                'spplrInvcNo' => $purchaseList->spplrInvcNo,
                                'spplrSdcId' => $purchaseList->spplrSdcId,
                                'spplrMrcNo' => $purchaseList->spplrMrcNo,
                                'rcptTyCd' => $purchaseList->rcptTyCd,
                                'pmtTyCd' => $purchaseList->pmtTyCd,
                                'cfmDt' => $purchaseList->cfmDt,
                                'salesDt' => $purchaseList->salesDt,
                                'stockRlsDt' => $purchaseList->stockRlsDt,
                                'totItemCnt' => $purchaseList->totItemCnt,
                                'taxblAmtA' => $purchaseList->taxblAmtA,
                                'taxblAmtB' => $purchaseList->taxblAmtB,
                                'taxblAmtC' => $purchaseList->taxblAmtC,
                                'taxblAmtD' => $purchaseList->taxblAmtD,
                                'taxblAmtE' => $purchaseList->taxblAmtE,
                                'taxRtA' => $purchaseList->taxRtA,
                                'taxRtB' => $purchaseList->taxRtB,
                                'taxRtC' => $purchaseList->taxRtC,
                                'taxRtD' => $purchaseList->taxRtD,
                                'taxRtE' => $purchaseList->taxRtE,
                                'taxAmtA' => $purchaseList->taxAmtA,
                                'taxAmtB' => $purchaseList->taxAmtB,
                                'taxAmtC' => $purchaseList->taxAmtC,
                                'taxAmtD' => $purchaseList->taxAmtD,
                                'taxAmtE' => $purchaseList->taxAmtE,
                                'totTaxblAmt' => $purchaseList->totTaxblAmt,
                                'totTaxAmt' => $purchaseList->totTaxAmt,
                                'totAmt' => $purchaseList->totAmt,
                                'remark' => $purchaseList->remark,
                                'itemList' => $purchaseList->items->map(function ($item) {
                                    return [
                                        'itemSeq' => $item->itemSeq,
                                        'itemCd' => $item->itemCd,
                                        'itemClsCd' => $item->itemClsCd,
                                        'itemNm' => $item->itemNm,
                                        'pkgUnitCd' => $item->pkgUnitCd,
                                        'pkg' => $item->pkg,
                                        'qtyUnitCd' => $item->qtyUnitCd,
                                        'qty' => $item->qty,
                                        'prc' => $item->prc,
                                        'splyAmt' => $item->splyAmt,
                                        'dcRt' => $item->dcRt,
                                        'dcAmt' => $item->dcAmt,
                                        'taxTyCd' => $item->taxTyCd,
                                        'taxblAmt' => $item->taxblAmt,
                                        'taxAmt' => $item->taxAmt,
                                        'totAmt' => $item->totAmt,
                                        'itemExprDt' => $item->itemExprDt,
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
                'message' => 'An error occurred while retrieving Purchase List/s',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $GetPurchaseLists = GetPurchaseList::find($id);
        return response()->json($GetPurchaseLists);
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $GetPurchaseLists = GetPurchaseList::find($id);
        $GetPurchaseLists->update($request->all());
        return response()->json($GetPurchaseLists, 200);
    }

    public function destroy($id)
    {
        GetPurchaseList::destroy($id);
        return response()->json(null, 204);
    }
}