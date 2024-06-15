<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $customers = Customer::all();
            $now = date('YmdHis');
            Log::info('Customers retrieved successfully');
            Log::info($customers);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'custmrLst' => $customers
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get Customers');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get Customers',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */

    public function show(Customer $customer) {
        try {
            $now = date('YmdHis');
            Log::info('Customer retrieved successfully');
            Log::info($customer);
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'custmr' => $customer
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get customer');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to get customer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = $request->all();

            Log::info('Customer data');
            Log::info($data);

            $validator = Validator::make($data, [
                'customerNo' => 'required|unique:customers',
                'customerTin' => 'required|unique:customers',
                'customerName' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation Error',
                    'error' => $validator->errors()
                ], 400);
            }

            $now = date('YmdHis');

            $customer = Customer::create($data);

            Log::info('Customer created successfully');
            Log::info($customer);

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'custmr' => $customer
                    ]
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to create Customer');
            Log::error($e);
            return response()->json([
                'message' => 'Failed to create Customer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Customer $customer) {
        try {
            $data = $request->all();
            $now = date('YmdHis');

            $customer->customerNo = $data['customerNo'];
            $customer->customerTin = $data['customerTin'];
            $customer->customerName = $data['customerName'];
            $customer->save();

            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'custmr' => $customer
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating customer',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Customer $customer) {
        try {
            $customer->delete();
            $now = date('YmdHis');
            return response()->json([
                'message' => 'success',
                'data' => [
                    "resultCd" => "000",
                    "resultMsg" => "Successful",
                    "resultDt" => $now,
                    "data" => [
                        'custmr' => $customer
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting customer',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
