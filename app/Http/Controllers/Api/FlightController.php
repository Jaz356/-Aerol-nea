<?php

namespace App\Http\Controllers\Api;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::all();

        return response()->json($flights, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $flight = new Flight();
        $flight->name = $request->name;
        $flight->destination = $request->destination;
        $flight->save();

        return response()->json($flight, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $flight = Flight::find($id);

        if ($flight) {
            return response()->json($flight, 200);
        } else {
            return response()->json(['error' => 'Flight not found'], 404);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);

        if ($flight) {
            $flight->name = $request->name;
            $flight->destination = $request->destination;
            $flight->save();

            return response()->json($flight, 200);
        } else {
            return response()->json(['error' => 'Flight not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $flight = Flight::find($id);

        if ($flight) {
            $flight->delete();
            return response()->json(['message' => 'Flight deleted'], 200);
        } else {
            return response()->json(['error' => 'Flight not found'], 404);
        }
    }
}
