<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    //Melihat semua data
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

    // Menambahkan data
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

     // Menampilkan satu data
    public function show(string $id){
        $author=Author::find($id);

        if(!$author){
            return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Get detail resource',
            'data'=>$author
        ],200);
    }

    // Update data
    public function update(string $id, Request $request){
        // 1. Mencari data
         $author=Author::find($id);

         if(!$author){
            return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);
         }

        // 2. Validator
       $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'bio' => 'required|string',
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
            'bio'=> $request->bio,

        ];

        // 4. handle image (upload & delete image)
        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $image->store('authors','public');
       

            if ($author->photo){
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

        $data['photo']=$image->hashName();
        }

        // 5. update data baru ke database
        $author->update($data);

          return response()->json([
            'success'=>true,
            'message'=> 'Resource updated succesfully',
            'data'=> $author
        ],200);
    }

    // Hapus Data
    public function destroy(string $id){
        $author=Author::find($id);

        if(!$author){
             return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);

        }

        if($author->cover_photo){
            // delete from storage
            Storage::disk('public')->delete('authors/'. $author->photo);
        }

        $author->delete();

        return response()->json([
            'success'=>true,
            'message'=> 'Delete Message Succesfully'

        ]);
    }

}
