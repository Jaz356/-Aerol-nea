<?php

namespace App\Http\Controllers\Api;

use App\Models\Plane;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planes = Plane::all();

        return response()->json($planes, 200);
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

        $plane = new Plane($validatedData);
        $plane->save();

        return response()->json($plane, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $plane = Plane::find($id);

        if ($plane) {
            return response()->json($plane, 200);
        } else {
            return response()->json(['error' => 'Plane not found'], 404);
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

        $plane = Plane::find($id);

        if ($plane) {
            $plane->update($validatedData);
            return response()->json($plane, 200);
        } else {
            return response()->json(['error' => 'Plane not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plane = Plane::find($id);

        if ($plane) {
            $plane->delete();
            return response()->json(['message' => 'Plane deleted'], 200);
        } else {
            return response()->json(['error' => 'Plane not found'], 404);
        }
    }
}
