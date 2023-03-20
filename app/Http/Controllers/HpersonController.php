<?php

namespace App\Http\Controllers;

use App\Models\Hperson;

class HpersonController extends Controller
{
    public function __invoke()
    {
        $all = Hperson::filter()->limit(1000)->get();

        return response()->json($all);
    }
}
