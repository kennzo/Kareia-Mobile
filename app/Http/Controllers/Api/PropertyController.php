<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        $response = [
            'properties' => $properties,
        ];
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = new Property();
        $property->fill($request->input());
        $property->save();
        return response()->json(['property' => $property], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $foundProperty = Property::find($property->id);
        if (!$foundProperty) {
            return response()->json(['message' => 'Property not found'], 404);
        }
        return response()->json(['property' => $foundProperty], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $foundProperty = Property::find($property->id);
        if (!$foundProperty) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $foundProperty->fill($request->input());
        $foundProperty->update();
        return response()->json(['property' => $foundProperty], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property $property
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Property $property)
    {
        $foundProperty = Property::find($property->id);
        if (!$foundProperty) {
            return response()->json(['message' => 'Property not found'], 404);
        }
        $foundProperty->delete();
        return response()->json(['message' => "Property [$property->id] deleted."], 200);
    }
}
