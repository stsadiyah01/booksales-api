<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres =[
        [
            "name"=> "Fiksi",
            "description"=> "Genre yang berisi karya imajinatif hasil ciptaan penulis"
        ],
        [
            "name"=> "Non Fiksi",
            "description"=> "Genre yang berisi karya berdasarkan fakta, data atau kejadian nyata seperti biografi dan buku sejarah."
        ],
        [
            "name"=> "Science Fiksi",
            "description"=>"Genre yang menggabungkan unsur fiksi dan ilmu pengetahuan serta teknologi."
        ],
        [
            "name"=> "Romance",
            "description"=> "Genre yang menceritakan tentang kisah cinta"
        ],
        [
            "name"=>"Education",
            "description"=> "Genre yang memberikan pembelajaran dan edukasi formal"
        ]  
    ];

    public function getGenres(){
        return $this->genres;
    }

}

