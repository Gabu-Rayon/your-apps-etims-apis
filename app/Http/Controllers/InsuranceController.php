<?php

namespace App\Http\Controllers;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function index()
    {
        $insurances = Insurance::all();
        return response()->json($insurances);
    }

    public function show($id)
    {
        $insurances = Insurance::find($id);
        return response()->json($insurances);
    }

    public function store(Request $request)
    {

        $request->validation([
            'insuranceCode' => 'required|string',
            'insuranceName' => 'required|string',
            'premiumRate' => 'required|numeric',
            'isUsed' => 'required|boolean',
        ]);
        return Insurance::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $insurances = Insurance::find($id);
        $insurances->update($request->all());
        return response()->json($insurances, 200);
    }

    public function destroy($id)
    {
        Insurance::destroy($id);
        return response()->json(null, 204);
    }
}