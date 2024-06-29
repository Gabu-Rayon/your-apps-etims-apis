<?php
namespace App\Http\Controllers;
use Exception;
use Carbon\Carbon;
use

Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class MappingPurchaseController extends Controller
{
    public function store(Request $request){
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'supplierInvcNo' => 'nullable|string',
                'purchaseTypeCode' => 'nullable|string',
                'purchaseStatusCode' => 'required|string',
                'itemPurchases' => 'required|array',
                'itemPurchases.*.supplierItemCode' => 'nullable|string',
                'itemPurchases.*.itemCode' => 'nullable|string|exists:items,itemCode',
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

            $purchaseToMap = Purchase::where('supplierInvcNo', $data['supplierInvcNo'])
                ->where('purchTypeCode', $data['purchaseTypeCode'])
                ->where('purchStatusCode', $data['purchaseStatusCode'])
                ->first();

            if (!$purchaseToMap) {
                return response()->json([
                    'message' => 'Purchase not found',
                    'error' => 'Purchase not found in the database'
                ], 404);
            }


            foreach ($data['itemPurchases'] as $itemPurchase) {
                $item = PurchaseItem::where('itemCode', $itemPurchase['itemCode'])
                    ->where('supplrItemCode', $itemPurchase['supplierItemCode'])
                    ->where('purchase_id', $purchaseToMap->id)
                    ->first();

                if (!$item) {
                    return response()->json([
                        'message' => 'Item not found',
                        'error' => 'Item not found in the database'
                    ], 404);
                }

                $item->quantity += $itemPurchase['mapQuantity'];
            }

            $purchaseToMap->mapping = true;

            $purchaseToMap->save();

            return response()->json([
                'statusCode' => 200,
                'message'=> 'Success',
                'data' => null
            ], 200);


        } catch (QueryException $e) {
            Log::error('Failed to Map Purchase');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to Map Purchase',
                'error' => 'Purchase Status Code or Item Code does not exist in the database'
            ], 500);
        }
        
        catch (Exception $e) {
            Log::error('Failed to Map Purchase');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to Map Purchase',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}