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
        $plane = new Plane();
        $plane->name = $request->name;
        $plane->model = $request->model;
        $plane->capacity = $request->capacity;
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
        $plane = Plane::find($id);

        if ($plane) {
            $plane->name = $request->name;
            $plane->model = $request->model;
            $plane->capacity = $request->capacity;
            $plane->save();

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
