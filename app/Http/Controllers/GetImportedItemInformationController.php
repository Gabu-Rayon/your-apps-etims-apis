<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\GetImportedItemInformation;


class GetImportedItemInformationController extends Controller
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

            // Retrieve the imported items
            $importedItems = GetImportedItemInformation::when($date, function ($query, $date) {
                return $query->where('created_at', '>=', $date);
            })->get();

            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'ImportedItems' => $importedItems
                    ]
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving Imported Item Information list',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $getImportedItemInformations = GetImportedItemInformation::find($id);
            $now = date('YmdHis');

            if (!$getImportedItemInformations) {
                return response()->json([
                    'message' => 'Imported Item Information not found'
                ], 404);
            }

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'ImportedItem' => $getImportedItemInformations
                    ]
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving Imported Item Information',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'srNo' => 'required|integer',
                'taskCode' => 'required|string|max:255',
                'itemName' => 'required|string|max:255',
                'hsCode' => 'required|string|max:255',
                'pkgUnitCode' => 'required|string|max:10',
                'netWeight' => 'required|numeric',
                'invForCode' => 'required|string|max:255',
                'declarationDate' => 'required|date_format:YmdHis',
                'orginNationCode' => 'required|string|max:3',
                'qty' => 'required|numeric',
                'supplierName' => 'required|string|max:255',
                'nvcFcurExcrt' => 'required|numeric',
                'itemSeq' => 'required|integer',
                'exprtNatCode' => 'required|string|max:3',
                'qtyUnitCode' => 'required|string|max:10',
                'agentName' => 'required|string|max:255',
                'declarationNo' => 'required|string|max:255',
                'package' => 'required|string|max:255',
                'grossWeight' => 'required|numeric',
                'invForCurrencyAmount' => 'required|numeric',
                'status' => 'required|string|max:50',
                'mapped_itemCd' => 'required|string|max:255',
                'mapped_date' => 'required|date_format:YmdHis',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            $now = date('YmdHis');

            $getImportedItemInformations = GetImportedItemInformation::create($request->all());

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'ImportedItem' => $getImportedItemInformations
                    ]
                ]
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating Imported Item Information',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $getImportedItemInformations = GetImportedItemInformation::find($id);

            if (!$getImportedItemInformations) {
                return response()->json([
                    'message' => 'Imported Item Information not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'srNo' => 'required|integer',
                'taskCode' => 'required|string|max:255',
                'itemName' => 'required|string|max:255',
                'hsCode' => 'required|string|max:255',
                'pkgUnitCode' => 'required|string|max:10',
                'netWeight' => 'required|numeric',
                'invForCode' => 'required|string|max:255',
                'declarationDate' => 'required|date_format:YmdHis',
                'orginNationCode' => 'required|string|max:3',
                'qty' => 'required|numeric',
                'supplierName' => 'required|string|max:255',
                'nvcFcurExcrt' => 'required|numeric',
                'itemSeq' => 'required|integer',
                'exprtNatCode' => 'required|string|max:3',
                'qtyUnitCode' => 'required|string|max:10',
                'agentName' => 'required|string|max:255',
                'declarationNo' => 'required|string|max:255',
                'package' => 'required|string|max:255',
                'grossWeight' => 'required|numeric',
                'invForCurrencyAmount' => 'required|numeric',
                'status' => 'required|string|max:50',
                'mapped_itemCd' => 'required|string|max:255',
                'mapped_date' => 'required|date_format:YmdHis',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 400);
            }

            $now = date('YmdHis');

            $getImportedItemInformations->update($request->all());

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'ImportedItem' => $getImportedItemInformations,
                    ]
                ]
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating Imported Item Information',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $getImportedItemInformations = GetImportedItemInformation::find($id);

            if (!$getImportedItemInformations) {
                return response()->json([
                    'message' => 'Imported Item Information not found'
                ], 404);
            }

            $now = date('YmdHis');

            $getImportedItemInformations->delete();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'ImportedItem' => $getImportedItemInformations
                    ]
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting Imported Item Information',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}