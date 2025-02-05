<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
    public function index()
    {
        $planes = Plane::all();
        return response()->json($planes, 200);
    }

    public function store(Request $request)
    {
        $plane = Plane::create($request->all());
        return response()->json($plane, 201);
    }

    public function show($id)
    {
        $plane = Plane::findOrFail($id);
        return response()->json($plane, 200);
    }

    public function update(Request $request, $id)
    {
        $plane = Plane::findOrFail($id);
        $plane->update($request->all());
        return response()->json($plane, 200);
    }

    public function destroy($id)
    {
        $plane = Plane::findOrFail($id);
        $plane->delete();
        return response()->json(['message' => 'Plane deleted'], 200);
    }
}