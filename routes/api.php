<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\BranchUserController;
use App\Http\Controllers\InitializationController;
use App\Http\Controllers\CompositionItemController;
use App\Http\Controllers\GetPurchaseListController;
use App\Http\Controllers\MapImportedItemController;
use App\Http\Controllers\MappingPurchaseController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\ItemOpeningStockController;
use App\Http\Controllers\UpdateStockIODataController;
use App\Http\Controllers\ItemClassificationController;
use App\Http\Controllers\AddDirectCreditNoteController;
use App\Http\Controllers\StockUpdateByInvoiceNoController;
use App\Http\Controllers\MapPurchaseSearchByDateController;
use App\Http\Controllers\UpdateMapPurchaseStatusController;
use App\Http\Controllers\GetImportedItemInformationController;
use App\Http\Controllers\StockMoveListController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('GetCodeList', CodeController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);

Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance']);
// Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance'])->middleware('apikey');

Route::apiResource('insurance', InsuranceController::class);
Route::apiResource('purchase', PurchaseController::class);
Route::apiResource('GetImportedItemInformation', GetImportedItemInformationController::class);
Route::apiResource('GetPurchaseList', GetPurchaseListController::class);
Route::apiResource('MapImportedItem', MapImportedItemController::class);
Route::apiResource('MapPurchase', MappingPurchaseController::class);
Route::apiResource('UpdateMapPurchaseStatus', UpdateMapPurchaseStatusController::class);
Route::apiResource('SearchByDate', MapPurchaseSearchByDateController::class);
Route::apiResource('AddDirectCreditNote', AddDirectCreditNoteController::class);
// StockAdjustmentController
Route::apiResource('StockAdjustment', StockAdjustmentController::class);
// StockUpdateByInvoiceNoController
Route::apiResource('StockUpdate/ByInvoiceNo', StockUpdateByInvoiceNoController::class);
// UpdateStockIOData
Route::apiResource('UpdateStockIOData', UpdateStockIODataController::class);


Route::apiResource('GetNoticeList', NoticeController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('GetItemClassificationList', ItemClassificationController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('Initialization', InitializationController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('AddBranchUser', BranchUserController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('CompositionItemList', CompositionItemController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('Customer', CustomerController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('ItemsList', ItemController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('GetBranchList', BranchController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('ItemOpeningStock', ItemOpeningStockController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::apiResource('StockMoveList', StockMoveListController::class)->only([
    'index',
    'store',
    'update',
    'destroy'
]);
Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance']);