<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hopdlog;
use App\Traits\EncounterGenerator;

class EncounterController extends Controller
{
    use EncounterGenerator;
    
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

    public function generate(Request $request) {
        $validated = $request->validate([
            'hpercode' => 'required',
            'tscode' => 'required',
            'priority' => 'required',
            'teleconsultation' => 'required',
        ]);

        $enccode = $this->generateEncounter(
            $validated['hpercode'],
            $validated['tscode'],
            $validated['priority'],
            $validated['teleconsultation']
        );

        if(!$enccode) {
            return response()->json([
                'message' => 'Failed to generate encounter',
            ], 500);
        }

        return response()->json($enccode);
    }
}
