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
    // public function index()
    // {
    //     try {
    //         $notices = GetImportedItemInformation::all();
    //         $now = date('YmdHis');
    //         return response()->json([
    //             'message' => 'success',
    //             'data' => [
    //                 "resultCd" => "000",
    //                 "resultMsg" => "Successful",
    //                 "resultDt" => $now,
    //                 "data" => [
    //                     'noticeList' => $notices
    //                 ]
    //             ]
    //         ], 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => 'An error occurred while retrieving Get Imported Item Information list',
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
        $getImportedItemInformations = GetImportedItemInformation::find($id);
        return response()->json($getImportedItemInformations);
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $getImportedItemInformations = GetImportedItemInformation::find($id);
        $getImportedItemInformations->update($request->all());
        return response()->json($getImportedItemInformations, 200);
    }

    public function destroy($id)
    {
        GetImportedItemInformation::destroy($id);
        return response()->json(null, 204);
    }
}