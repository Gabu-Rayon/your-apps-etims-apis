<?php

namespace App\Http\Controllers;

use App\Models\ItemClassification;
use Illuminate\Http\Request;

class ItemClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        try {
            $date = $request->query('date');

            if (!$date) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'date is required'
                ], 400);
            }

            if (!preg_match('/^\d{14}$/', $date)) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => 'date format is incorrect'
                ], 400);
            }

            $itemClassifications = ItemClassification::where('created_at', '>=', $date)->get();

            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemClassifications' => $itemClassifications
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to get item classifications',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $itemClassification = new ItemClassification();
            $itemClassification->itemCls = $data['itemCls'];
            $itemClassification->itemClsNm = $data['itemClsNm'];
            $itemClassification->itemClsDesc = $data['itemClsDesc'];
            $itemClassification->useYn = $data['useYn'];
            $itemClassification->userDfnNm1 = $data['userDfnNm1'];
            $itemClassification->userDfnNm2 = $data['userDfnNm2'];
            $itemClassification->userDfnNm3 = $data['userDfnNm3'];
            $itemClassification->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemCls' => $itemClassification
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while storing item classification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(ItemClassification $itemClassification) {
        try {
            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemCls' => $itemClassification
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while getting item classification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemClassification $itemClassification) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $itemClassification->itemCls = $data['itemCls'];
            $itemClassification->itemClsNm = $data['itemClsNm'];
            $itemClassification->itemClsDesc = $data['itemClsDesc'];
            $itemClassification->useYn = $data['useYn'];
            $itemClassification->userDfnNm1 = $data['userDfnNm1'];
            $itemClassification->userDfnNm2 = $data['userDfnNm2'];
            $itemClassification->userDfnNm3 = $data['userDfnNm3'];
            $itemClassification->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemCls' => $itemClassification
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating item classification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemClassification $itemClassification) {
        try {
            $itemClassification->delete();

            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => null
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting item classification',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}