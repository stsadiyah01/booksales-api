<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //Method
     public function index(){
        $authors = Author::all();
        
        return view('authors',['authors' => $authors]);
    }
}
