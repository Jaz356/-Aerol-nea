<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return response()->json($flights, 200);
    }

    public function store(Request $request)
    {
        $flight = Flight::create($request->all());
        return response()->json($flight, 201);
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        return response()->json($flight, 200);
    }

    public function update(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);
        $flight->update($request->all());
        return response()->json($flight, 200);
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();
        return response()->json(['message' => 'Flight deleted'], 200);
    }
}