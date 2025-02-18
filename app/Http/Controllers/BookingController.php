<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = booking::all();
        return response()->json($bookings, 200);
    }

    public function store(Request $request)
    {
        $booking = booking::create($request->all());
        return response()->json($booking, 201);
    }

    public function show($id)
    {
        $booking = booking::findOrFail($id);
        return response()->json($booking, 200);
    }

    public function update(Request $request, $id)
    {
        $booking = booking::findOrFail($id);
        $booking->update($request->all());
        return response()->json($booking, 200);
    }

    public function destroy($id)
    {
        $booking = booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'booking deleted'], 200);
    }
}