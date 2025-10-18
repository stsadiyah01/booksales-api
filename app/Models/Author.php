<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "authors";

    protected $fillable = [
        'name','photo','bio'
    ];









    //Method
    // private $authors=[
    //     [
    //         "name"=> "Tere Liye",
    //         "photo"=> "tere_liye.jpg",
    //         "bio"=> "Tere Liye adalah penulis novel terkenal asal Indonesia yang dikenal dengan karya-karya bertema kehidupan dan nilai moral."
    //     ],
    //     [
    //         "name"=> "Andrea Hirata",
    //         "photo"=> "andrea_hirata.jpg",
    //         "bio"=> "Andrea Hirata merupakan penulis novel asal Indonesia yang dikenal dengan karya karya bertema keseharian dan semangat muda seperti Laskar Pelangi"
    //     ],
    //     [
    //         "name"=>"Dee Lestari",
    //         "photo"=> "dee_lestari.jpg",
    //         "bio"=> "Dee Lestari adalah penulis, penyanyi dan pencipta lagu Indonesia yang dikenal lewat seri Supernova"
    //     ],
    //     [
    //         "name"=> "Ahmad Fuadi",
    //         "photo"=> "ahmad_fuadi.jpg",
    //         "bio"=> "Ahmad Fuadi dikenal sebagai penulis novel trilogi Negri 5 Menara yang terinspirasi dari kisah hidupnya sendiri"
    //     ],
    //     [
    //         "name"=> "J.K Rowling",
    //         "photo"=> "jk_rowling.jpg",
    //         "bio"=> "J.K Rowling adalah penulis asal Inggris yang terkenal di seluruh dunia melalui seri novel fantasi Harry Potter"
    //     ]
    // ];
    // public function getAuthors(){
    //     return $this->authors;
    // }
}
