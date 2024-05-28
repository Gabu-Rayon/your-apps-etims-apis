<?php
namespace App\Http\Controllers;
use App\Models\MappedPurchase;
use App\Models\MappedPurchaseItemList;
use

Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use
Carbon\Carbon;
class MappedPurchaseController extends Controller
{
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'supplierInvcNo' => 'required|string',
                'purchaseTypeCode' => 'required|string',
                'purchaseStatusCode' => 'required|string',
                'itemPurchases' => 'required|array',
                'itemPurchases.*.supplierItemCode' => 'required|string',
                'itemPurchases.*.itemCode' => 'required|string',
                'itemPurchases.*.mapQuantity' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data');
            Log::info($data);

            $mappedPurchase = MappedPurchase::create([
                'supplierInvcNo' => $data['supplierInvcNo'],
                'purchaseTypeCode' => $data['purchaseTypeCode'],
                'purchaseStatusCode' => $data['purchaseStatusCode']
            ]);

            foreach ($data['itemPurchases'] as $item) {
                $mappedPurchaseItem = new MappedPurchaseItemList([
                    'mapped_purchase_id' => $mappedPurchase->id,
                    'supplierItemCode' => $item['supplierItemCode'],
                    'itemCode' => $item['itemCode'],
                    'mapQuantity' => $item['mapQuantity'],
                ]);
                $mappedPurchaseItem->save();
            }

            $mappedPurchase = MappedPurchase::with('itemPurchases')->find($mappedPurchase->id);

            Log::info('New Purchase Mapped successfully');
            Log::info($mappedPurchase);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => Carbon::now(),
                    "data" => [
                        'supplierInvcNo' => $mappedPurchase->supplierInvcNo,
                        'purchaseTypeCode' => $mappedPurchase->purchaseTypeCode,
                        'purchaseStatusCode' => $mappedPurchase->purchaseStatusCode,
                        'itemPurchases' => $mappedPurchase->itemPurchases->map(function ($item) {
                            return [
                                'supplierItemCode' => $item->supplierItemCode,
                                'itemCode' => $item->itemCode,
                                'mapQuantity' => $item->mapQuantity,
                            ];
                        })->toArray(),
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to Map Purchase');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to Map Purchase',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}