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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
        ]);

        $flight = new Flight($validatedData);
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
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'destination' => 'sometimes|required|string|max:255',
        ]);

        $flight = Flight::find($id);

        if ($flight) {
            $flight->update($validatedData);
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
