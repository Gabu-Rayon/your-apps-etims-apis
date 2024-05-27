<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\InitializationController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\ItemClassificationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NoticeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('GetCodeList', CodeController::class)->only(['index']);
Route::apiResource('GetNoticeList', NoticeController::class)->only(['index']);
Route::apiResource('GetBranchList', BranchController::class)->only(['index']);
Route::apiResource('AddBranchUser', BranchUserController::class)->only(['index', 'store']);
Route::apiResource('ItemsList', ItemController::class)->only(['index', 'store', 'update']);
Route::apiResource('Initialization', InitializationController::class)->only(['index', 'store']);
Route::apiResource('GetItemClassificationList', ItemClassificationController::class)->only(['index']);
Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance']);