<?php

namespace App\Http\Controllers;

use App\Models\ItemClassification;
use Illuminate\Http\Request;

class ItemClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $itemClassification = ItemClassification::all();
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'itemClsList' => $itemClassification
                    ]
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while retrieving item classification list',
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
