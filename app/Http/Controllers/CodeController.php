<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            // TODO: add date parameter so that only codes created after that date are returned
            $codes = Code::all();
            $now = date('YmdHis');
            foreach ($codes as $code) {
                $code['dtlList'] = $code->details()->get();
            }
            Log::info('Codes retrieved successfully');
            Log::info($codes);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'clsList' => $codes
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get codes');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get codes',
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

            $validator = Validator::make($data, [
                'cdCls' => 'required|string|max:10',
                'cdClsNm' => 'required|string|max:50',
                'cdClsDesc' => 'string|max:100',
                'useYn' => 'required|string|max:1',
                'userDfnNm1' => 'string|max:50',
                'userDfnNm2' => 'string|max:50',
                'userDfnNm3' => 'string|max:50'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'error' => $validator->errors()
                ], 400);
            }

            // TODO: Add create details so that the details are created along with the code
            
            $now = date('YmdHis');

            $code = new Code();
            $code->cdCls = $data['cdCls'];
            $code->cdClsNm = $data['cdClsNm'];
            $code->cdClsDesc = $data['cdClsDesc'];
            $code->useYn = $data['useYn'];
            $code->userDfnNm1 = $data['userDfnNm1'];
            $code->userDfnNm2 = $data['userDfnNm2'];
            $code->userDfnNm3 = $data['userDfnNm3'];

            $code->save();

            Log::info('Code created successfully');
            Log::info($code);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "code" => $code
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to create code');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create code',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Code $code) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $code->cdCls = $data['cdCls'];
            $code->cdClsNm = $data['cdClsNm'];
            $code->cdClsDesc = $data['cdClsDesc'];
            $code->useYn = $data['useYn'];
            $code->userDfnNm1 = $data['userDfnNm1'];
            $code->userDfnNm2 = $data['userDfnNm2'];
            $code->userDfnNm3 = $data['userDfnNm3'];

            $code->save();

            Log::info('Code updated successfully');
            Log::info($code);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "code" => $code
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update code');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to update code',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Code $code) {
        try {
            $code->delete();

            $now = date('YmdHis');

            Log::info('Code deleted successfully');

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
            Log::error('Failed to delete code');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to delete code',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}