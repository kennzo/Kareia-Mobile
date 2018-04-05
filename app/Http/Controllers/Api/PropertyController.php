<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Log;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $properties = Property::where('user_id', '=', Auth::user()->getAuthIdentifier())
                                  ->get();
            $response = [
                'properties' => $properties,
            ];
            return response()->json($response, 200);
        } catch (Exception $exception) {
            return response()->json([ 'error' => $exception->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = $request->input();
        $parameters['user_id'] = Auth::user()->getAuthIdentifier();

        $property = new Property();
        $property->fill($parameters);
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
        /** @var Property $foundProperty */
        $foundProperty = Property::find($property->id);
        if ( ! $foundProperty) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        if ($foundProperty->user_id == Auth::user()->getAuthIdentifier()) {
            $foundProperty->fill($request->input());
            $foundProperty->update();
            return response()->json(['property' => $foundProperty], 200);
        }

        return response()->json(['message' => 'Unauthorized access. Cannot update.'], 401);
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
        /** @var Property $foundProperty */
        $foundProperty = Property::find($property->id);
        if (!$foundProperty) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        if ($foundProperty->user_id == Auth::user()->getAuthIdentifier()) {
            $foundProperty->delete();
            return response()->json(['message' => "Property [$property->id] deleted."], 200);
        }

        return response()->json(['message' => 'Unauthorized access. Cannot delete.'], 401);
    }
}
