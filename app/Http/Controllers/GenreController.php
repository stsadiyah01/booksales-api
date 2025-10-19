<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    // Melihat semua data
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
    
     // Menampilkan satu data
    public function show(string $id){
       $genre=Genre::find($id);

        if(!$genre){
            return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Get detail resource',
            'data'=>$genre
        ],200);
    }

    // Update data
    public function update(string $id, Request $request){
        // 1. Mencari data
        $genre=Genre::find($id);

         if(!$genre){
            return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);
         }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

         if ($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=> $validator->errors(),
            ],422);
        }


        // 3. Siapkan data yang ingin di update
        $data = [
            'name'=> $request->name,
            'description'=> $request->description
        ];

        // 4. update data baru ke database
       $genre->update($data);

          return response()->json([
            'success'=>true,
            'message'=> 'Resource updated succesfully',
            'data'=>$genre
        ],200);
    }

    // Hapus Data
    public function destroy(string $id){
       $genre=Genre::find($id);

        if(!$genre){
             return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);

        }

       $genre->delete();

        return response()->json([
            'success'=>true,
            'message'=> 'Delete Message Succesfully'

        ]);
    }


}

