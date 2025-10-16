<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //Method
     public function index(){
        $authors = Author::all();
        
        return response()->json([
            "succes"=> true,
            "message"=>"Get all resources",
            "data"=> $authors
        ],200);
        
    }
}
