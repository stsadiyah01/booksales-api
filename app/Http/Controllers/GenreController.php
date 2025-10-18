<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    // Method
    public function index(){
        $genres = Genre::all();

          if($genres->isEmpty()){
            return response()->json([
                "succes"=>true,
                "message"=> "Resource data not found"
            ],200);
        }
        
        return response()->json([
            "succes"=> true,
            "message"=>"Get all resources",
            "data"=> $genres
        ],200);
        
    }

    public function store(Request $request){
        // Validator
          $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);


        // Check validator
        if ($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=> $validator->errors(),
            ],422);
        }

        // Insert Data
        $genre = Genre::create([
            'name'=> $request->name,
            'description'=> $request->description
        ]);

        // Response

        return response()->json([
            'success'=>true,
            'message'=> 'Resource added succesfully',
            'data'=> $genre
        ],201);
    }   
}
