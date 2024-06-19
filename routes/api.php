<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddSaleController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\GetPurchaseListController;
use App\Http\Controllers\MapImportedItemController;
use App\Http\Controllers\MappingPurchaseController;
use App\Http\Controllers\AddSaleCreditNoteController;
use App\Http\Controllers\AddDirectCreditNoteController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchUserController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\CompositionItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MapPurchaseSearchByDateController;
use App\Http\Controllers\UpdateMapPurchaseStatusController;
use App\Http\Controllers\GetSalesByTraderInvoiceNoController;
use App\Http\Controllers\GetImportedItemInformationController;
use App\Http\Controllers\InitializationController;
use App\Http\Controllers\ItemClassificationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemOpeningStockController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StockAdjustmentController;
use App\Http\Controllers\StockMoveListController;
use App\Http\Controllers\StockUpdateByInvoiceNoController;
use App\Models\StockUpdateByInvoiceNo;

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
Route::apiResource('code', CodeController::class);
Route::apiResource('itemclassifications', ItemClassificationController::class);
Route::apiResource('notice', NoticeController::class);
Route::apiResource('apiinitialization', InitializationController::class);
Route::apiResource('branchuser', BranchUserController::class);
Route::apiResource('compositionitemslist', CompositionItemController::class);
Route::apiResource('customer', CustomerController::class);
Route::apiResource('items', ItemController::class);
Route::apiResource('brancheslist', BranchController::class);
Route::apiResource('itemopeningstock', ItemOpeningStockController::class);
Route::apiResource('purchase', PurchaseController::class);
Route::apiResource('GetImportedItemInformation', GetImportedItemInformationController::class);
Route::apiResource('MapImportedItem', MapImportedItemController::class);
Route::apiResource('MapPurchase', MappingPurchaseController::class);
Route::apiResource('UpdateMapPurchaseStatus', UpdateMapPurchaseStatusController::class);
Route::apiResource('SearchByDate', MapPurchaseSearchByDateController::class);
Route::apiResource('AddDirectCreditNote', AddDirectCreditNoteController::class);
Route::apiResource('AddSale', AddSaleController::class);
Route::apiResource('AddSaleCreditNote', AddSaleCreditNoteController::class);
Route::apiResource('GetSalesByTraderInvoiceNo', GetSalesByTraderInvoiceNoController::class);
Route::apiResource('stockmove', StockMoveListController::class);
Route::apiResource('stockadjustment', StockAdjustmentController::class);
Route::apiResource('StockUpdate/ByInvoiceNo', StockUpdateByInvoiceNoController::class);
