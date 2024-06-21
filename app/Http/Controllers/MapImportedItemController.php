<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\MappedImportedItem;
use App\Models\MappedImportedItemList;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MapImportedItemController extends Controller
{
    public function store(Request $request){
        try {
            $data = $request->all();
            $validator = Validator::make($data, [
                'importItemStatusCode' => 'required|numeric',
                'declarationDate' => 'required|string',
                'occurredDate' => 'required|string',
                'remark' => 'required|string',
                'importedItemLists' => 'required|array',
                'importedItemLists.*.taskCode' => 'required|string',
                'importedItemLists.*.itemCode' => 'required|string',
            ]);

            // Return validation errors if any
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()->all()
                ], 400);
            }

            Log::info('Request data', $data);

            // Create the MappedImportedItem
            $mappedImportedItem = MappedImportedItem::create([
                'importItemStatusCode' => $data['importItemStatusCode'],
                'declarationDate' => $data['declarationDate'],
                'occurredDate' => $data['occurredDate'],
                'remark' => $data['remark']
            ]);

            // Create associated MappedImportedItemList entries
            foreach ($data['importedItemLists'] as $item) {
                MappedImportedItemList::create([
                    'mapped_imported_item_id' => $mappedImportedItem->id,
                    'taskCode' => $item['taskCode'],
                    'itemCode' => $item['itemCode']
                ]);
            }

            // Reload the MappedImportedItem with its items
            $mappedImportedItem->load('importedItemLists');

            Log::info('New Imported Mapped successfully', ['item' => $mappedImportedItem]);

            $now = Carbon::now()->format('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'importItemStatusCode' => $mappedImportedItem->importItemStatusCode,
                        'declarationDate' => $mappedImportedItem->declarationDate,
                        'occurredDate' => $mappedImportedItem->occurredDate,
                        'remark' => $mappedImportedItem->remark,
                        'importedItemLists' => $mappedImportedItem->importedItemLists->map(function ($item) {
                            return [
                                'taskCode' => $item->taskCode,
                                'itemCode' => $item->itemCode
                            ];
                        })->toArray()
                    ]
                ]
            ]);
        } catch (Exception $e) {
            Log::error('Failed to Map Imported!', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'Failed to Map Imported Successfully!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}