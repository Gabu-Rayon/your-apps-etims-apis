<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\MappedPurchaseController;
use App\Http\Controllers\GetPurchaseListController;
use App\Http\Controllers\MapImportedItemController;
use App\Http\Controllers\UpdateMapPurchaseStatusController;
use App\Http\Controllers\GetImportedItemInformationController;

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


Route::apiResource('insurance', InsuranceController::class);
Route::apiResource('purchase', PurchaseController::class);
Route::apiResource('GetImportedItemInformation', GetImportedItemInformationController::class);
Route::apiResource('GetPurchaseList', GetPurchaseListController::class);
Route::apiResource('MapImportedItem', MapImportedItemController::class);
Route::apiResource('MapPurchase', MappedPurchaseController::class);
Route::apiResource('UpdateMapPurchaseStatus', UpdateMapPurchaseStatusController::class);