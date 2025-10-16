<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Method
     public function index(){
        $books = Book::all();
        
        return view('books',['books' => $books]);
    }
}
