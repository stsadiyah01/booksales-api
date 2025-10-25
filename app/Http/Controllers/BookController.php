<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    // Mengambil atau melihat semua data
    public function index(){
        $book= Book::with('genre','author')->get();

        if($book->isEmpty()){
            return response()->json([
                "succes"=>true,
                "message"=> "Resource data not found"
            ],200);
        }

        return response()->json([
            "succes"=> true,
            "message"=>"Get all resources",
            "data"=> $book
        ],200);

    }

    // Menambahkan data
    public function store(Request $request){
        // Validator
          $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:5048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);


        // Check validator
        if ($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=> $validator->errors(),
            ],422);
        }

        // Upload Image
        $image = $request->file('cover_photo');
        $image->store('books','public');


        // Insert Data
        $book = Book::create([
            'title'=> $request->title,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock,
            'cover_photo'=> $image->hashName(),
            'genre_id'=>$request->genre_id,
            'author_id'=>$request->author_id

        ]);

        // Response

        return response()->json([
            'success'=>true,
            'message'=> 'Resource added succesfully',
            'data'=> $book
        ],201);
    }

    // Menampilkan satu data
    public function show(string $id){
        $book= Book::with('genre','author')->find($id);

        if(!$book){
            return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Get detail resource',
            'data'=>$book
        ],200);
    }

    // Update data
    public function update(string $id, Request $request){
        // 1. Mencari data
         $book=Book::find($id);

         if(!$book){
            return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);
         }

        // 2. Validator
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:5048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if($validator->fails()){
            return response()->json([
                "success"=>false,
                "message"=> $validator->errors(),
            ],422);

        }

        // 3. Siapkan data yang ingin di update
        $data = [
            'title'=> $request->title,
            'description'=> $request->description,
            'price'=> $request->price,
            'stock'=> $request->stock,
            'genre_id'=>$request->genre_id,
            'author_id'=>$request->author_id

        ];

        // 4. handle image (upload & delete image)
        if($request->hasFile('cover_photo')){
            $image = $request->file('cover_photo');
            $image->store('books','public');


            if ($book->cover_photo){
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

        $data['cover_photo']=$image->hashName();
        }

        // 5. update data baru ke database
        $book->update($data);

          return response()->json([
            'success'=>true,
            'message'=> 'Resource updated succesfully',
            'data'=> $book
        ],200);
    }

    // Hapus Data
    public function destroy(string $id){
        $book=Book::find($id);

        if(!$book){
             return response()->json([
                'success'=>false,
                'message'=> 'Resource Not Found'
            ],404);

        }

        if($book->cover_photo){
            // delete from storage
            Storage::disk('public')->delete('books/'. $book->cover_photo);
        }

        $book->delete();

        return response()->json([
            'success'=>true,
            'message'=> 'Delete Message Succesfully'

        ]);
    }


}
