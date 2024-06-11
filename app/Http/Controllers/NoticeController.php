<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // TODO: add date parameter so that only notices created after that date are returned
            $notices = Notice::all();
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'noticeList' => $notices
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

            $notice = new Notice();
            $notice->noticeNo = $data['noticeNo'];
            $notice->title = $data['title'];
            $notice->cont = $data['cont'];
            $notice->dtlUrl = $data['dtlUrl'];
            $notice->regrNm = $data['regrNm'];
            $notice->regDt = $now;
            $notice->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'notice' => $notice
                    ]
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating a notice',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $notice->noticeNo = $data['noticeNo'];
            $notice->title = $data['title'];
            $notice->cont = $data['cont'];
            $notice->dtlUrl = $data['dtlUrl'];
            $notice->regrNm = $data['regrNm'];
            $notice->regDt = $now;
            $notice->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'notice' => $notice
                    ]
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating a notice',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice) {
        try {
            $notice->delete();
            $now = date('YmdHis');

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => null
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting a notice',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
