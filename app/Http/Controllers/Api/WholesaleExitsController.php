<?php

namespace App\Http\Controllers\Api;

use App\Models\ExitStrategies\Wholesale;
use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class WholesaleExitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Gets all the wholesale deals for the user
     *
     * @return Response
     */
    public function index()
    {
        try {
            $estimates = Wholesale::where('user_id', '=', Auth::user()->getAuthIdentifier())
                                  ->get();
            $response = [
                'estimates' => $estimates,
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
     * @return Response
     */
    public function store(Request $request)
    {
        $parameters = $request->input();
        $parameters['user_id'] = Auth::user()->getAuthIdentifier();

        $wholesale = new Wholesale();
        $wholesale->fill($parameters);
        $wholesale->save();
        return response()->json(['wholesale' => $wholesale], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExitStrategies\Wholesale  $wholesale
     * @return Response
     */
    public function show(Wholesale $wholesale)
    {
        $foundWholesale = Wholesale::find($wholesale->id);
        if (!$foundWholesale) {
            return response()->json(['message' => 'Wholesale Exit not found'], 404);
        }
        return response()->json(['wholesale' => $foundWholesale], 200);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExitStrategies\Wholesale  $wholesale
     * @return Response
     */
    public function update(Request $request, Wholesale $wholesale)
    {
        /** @var Wholesale $wholesale */
        $wholesale = Wholesale::find($wholesale->id);
        if ( ! $wholesale) {
            return response()->json(['message' => 'Wholesale Exit not found'], 404);
        }

        if ($wholesale->user_id == Auth::user()->getAuthIdentifier()) {
            $wholesale->fill($request->input());
            $wholesale->update();
            return response()->json(['wholesale' => $wholesale], 200);
        }

        return response()->json(['message' => 'Unauthorized access. Cannot update.'], 401);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExitStrategies\Wholesale $wholesale
     *
     * @return Response
     * @throws Exception
     */
    public function destroy(Wholesale $wholesale)
    {
        /** @var Wholesale $wholesale */
        $wholesale = Wholesale::find($wholesale->id);
        if (!$wholesale) {
            return response()->json(['message' => 'Wholesale Exit not found'], 404);
        }

        if ($wholesale->user_id == Auth::user()->getAuthIdentifier()) {
            $wholesale->delete();
            return response()->json(['message' => "Wholesale Exit [$wholesale->id] deleted."], 200);
        }

        return response()->json(['message' => 'Unauthorized access. Cannot delete.'], 401);    }
}
