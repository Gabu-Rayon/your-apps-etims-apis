<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
<<<<<<< HEAD
use App\Http\Controllers\CodeController;
=======
use App\Http\Controllers\InsuranceController;
>>>>>>> c0413d9 (Commit Changes)
=======
use App\Http\Controllers\InsuranceController;
>>>>>>> 7de08b4c13d0090a61a059f5b86ba52e50e0a8e9

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
<<<<<<< HEAD
<<<<<<< HEAD

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('GetCodeList', CodeController::class);
=======
Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance']);
// Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance'])->middleware('apikey');
>>>>>>> c0413d9 (Commit Changes)
=======
Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance']);
// Route::post('/AddInsurance', [InsuranceController::class, 'addInsurance'])->middleware('apikey');
>>>>>>> 7de08b4c13d0090a61a059f5b86ba52e50e0a8e9
