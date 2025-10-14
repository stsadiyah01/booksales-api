<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    private $books = [
        [
            'title'=> 'Pulang',
            'description'=> 'Petualangan Seorang Pemuda yang kembali ke desa kelahirannya',
            'price'=>40000,
            'stok'=> 15,
            'cover_photo'=> 'pulang.jpg',
            'genre_id'=> 1,
            'author_id' => 1
        ],
        [
           'title'=> 'Sebuah Seni Untuk Bersikap Bodoamat',
            'description'=> 'Buku yang membahas tentang kehidupan dan filosofi hidup seseorang',
            'price'=>25000,
            'stok'=> 5,
            'cover_photo'=> 'sebuah_seni.jpg',
            'genre_id'=> 2,
            'author_id' => 3  
        ],
        [
            'title'=> 'Naruto',
            'description'=> 'Buku yang membahas tentang jalan ninja seseorang',
            'price'=>20000,
            'stok'=> 5,
            'cover_photo'=> 'naruto.jpg',
            'genre_id'=> 1,
            'author_id' => 4
        ]
    ];

    public function getBooks(){
        return $this->books;
    }
}
