<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hopdlog;

class EncounterController extends Controller
{
    public function index(Request $request)
    {
        $hpersonal = $request->user()->hpersonal;

        if(!isset($request->limit)) {
            return response()->json([
                'message' => 'Limit is required',
            ], 400);
        }

        $encounters = Hopdlog::where('tscode', $hpersonal->deptcode)
            ->orderBy('opddate')
            ->filter()
            ->get();

        return response()->json($encounters);
    }
}
