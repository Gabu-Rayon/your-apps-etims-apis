<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insurance;
use Illuminate\Support\Facades\Validator;
use App\Models\ApiKey;

class InsuranceController extends Controller
{
    public function addInsurance(Request $request)
    {

        return Insurance::create($request->all());
        // Validate the API key
        //   $apiKeyValue = $request->header('ApiKey');
        //  $apiKey = ApiKey::where('key', $apiKeyValue)->first();

        //API key exists and is active
        // if (!$apiKey || !$apiKey->isUsed || !$apiKey->activated) {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }

        // Validate the request
        //     $validator = Validator::make($request->all(), [
        //         'insuranceCode' => 'required|string',
        //         'insuranceName' => 'required|string',
        //         'premiumRate' => 'required|numeric',
        //         'isUsed' => 'required|boolean',
        //     ]);

        //     if ($validator->fails()) {
        //         return response()->json($validator->errors(), 400);
        //     }

        //     // Create the insurance record
        //     $insurance = Insurance::create([
        //         'insuranceCode' => $request->insuranceCode,
        //         'insuranceName' => $request->insuranceName,
        //         'premiumRate' => $request->premiumRate,
        //         'isUsed' => $request->isUsed,
        //     ]);

        //     return response()->json($insurance, 201);

    }
}