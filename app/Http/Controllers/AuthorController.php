<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    //Method
     public function index(){
        $authors = Author::all();

          if($authors->isEmpty()){
            return response()->json([
                "succes"=>true,
                "message"=> "Resource data not found"
            ],200);
        }
        
        return response()->json([
            "succes"=> true,
            "message"=>"Get all resources",
            "data"=> $authors
        ],200);
        
    }

    public function store(Request $request){
        // Validator
          $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'bio' => 'required|string',
        ]);


        // Check validator
        if ($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=> $validator->errors(),
            ],422);
        }

        // Upload Image
        $image = $request->file('photo');
        $image->store('authors','public');


        // Insert Data
        $author = Author::create([
            'name'=> $request->name,
            'photo'=> $image->hashName(),
            'bio'=> $request->bio
           
        ]);

        // Response

        return response()->json([
            'success'=>true,
            'message'=> 'Resource added succesfully',
            'data'=> $author
        ],201);
    }   
}
