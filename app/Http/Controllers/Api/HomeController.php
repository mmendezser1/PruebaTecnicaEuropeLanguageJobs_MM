<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getDogs(Request $req)
    {
        $dogs = Dog::all();
        return response()->json([
            'dogs' => $dogs,

        ], 200);

    }
}
