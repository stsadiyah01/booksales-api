<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Method
    public function index(){
        $genres = Genre::all();
        
        return response()->json([
            "succes"=> true,
            "message"=>"Get all resources",
            "data"=> $genres
        ],200);
        
    }
}
