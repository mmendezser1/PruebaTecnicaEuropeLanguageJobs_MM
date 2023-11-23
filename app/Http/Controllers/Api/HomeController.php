<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function getDogs(Request $req)
    {
        $dogs = Dog::all();

        return response()->json([
            'dogs' => $dogs,
        ], 200);

    }

    public function createDog(Request $req)
    {

        $fileName = $req->file('image')->getClientOriginalName();

        try {

            $responseValidation = Validator::make($req->all(), [
                'image' => 'required|file',
                'name' => 'required',
                'race' => 'required',
                'age_months' => 'required|integer',
                'size' => 'required',
                'hair_color' => 'required',
                'hair_style' => 'required',
            ]);

            if ($responseValidation->fails()) {
                return response()->json(['message' => "Error on server: " . $responseValidation->messages()], 500);
            }

            $req->file('image')->move(public_path('images'), $fileName);
            //No puedo guardar el new Dog así => Dog::create($responseValidation->validated());
            //Porque en el image solo quiero guardar el nombre del archivo y le paso un file entero.

            Dog::create([
                'image' => $fileName,
                'name' => $req->input('name'),
                'race' => $req->input('race'),
                'age_months' => $req->input('age_months'),
                'size' => $req->input('size'),
                'hair_color' => $req->input('hair_color'),
                'hair_style' => $req->input('hair_style')]);

            return response()->json(['message' => "Dog created correctly"], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => "Error on server: " . $th->getMessage()], 500);

        }

    }
}
