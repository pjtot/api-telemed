<?php

namespace App\Http\Controllers;

use App\Models\Hperson;

class HpersonController extends Controller
{
    public function __invoke()
    {
        $all = Hperson::filter()->get();

        return response()->json($all);
    }
}
