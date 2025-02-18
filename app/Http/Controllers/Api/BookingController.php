<?php

namespace App\Http\Controllers\Api;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Bookings = Booking::all();

        return response()->json($Bookings, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'year' => 'required|integer',
        ]);

        $Booking = new Booking($validatedData);
        $Booking->save();

        return response()->json($Booking, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Booking = Booking::find($id);

        if ($Booking) {
            return response()->json($Booking, 200);
        } else {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'model' => 'sometimes|required|string|max:255',
            'manufacturer' => 'sometimes|required|string|max:255',
            'capacity' => 'sometimes|required|integer',
            'year' => 'sometimes|required|integer',
        ]);

        $Booking = Booking::find($id);

        if ($Booking) {
            $Booking->update($validatedData);
            return response()->json($Booking, 200);
        } else {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Booking = Booking::find($id);

        if ($Booking) {
            $Booking->delete();
            return response()->json(['message' => 'Booking deleted'], 200);
        } else {
            return response()->json(['error' => 'Booking not found'], 404);
        }
    }
}
