<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            "name"=> "Andrea Hirata",
            "photo"=> "andrea_hirata.jpg",
            "bio"=> "Andrea Hirata merupakan penulis novel Laskar Pelangi yang sangat populer dan telah diadaptasi menjadi film.",
        ]);

        Author::create([
            "name"=> "John Doe",
            "photo"=> "john_doe.jpg",
            "bio"=> "John Doe adalah penulis aksi yang kreatif, dikenal dengan cerita pahlawan dan petualangan menegangkan.",
        ]);

        Author::create([
            "name"=> "Dewi Lestari",
            "photo"=> "dewi_lestari.jpg",
            "bio"=> "Dewi Lestari, atau Dee, adalah penulis novel fantasi dan fiksi modern yang populer di kalangan pembaca muda.",
        ]);

        Author::create([
            "name"=> "Tere Liye",
            "photo"=> "tere_liye.jpg",
            "bio"=> "Tere Liye adalah penulis populer Indonesia yang dikenal dengan novel romantis dan inspiratif.",
        ]);

        Author::create([
            "name"=> "Ahmad Fuadi",
            "photo"=> "ahmad_fuadi.jpg",
            "bio"=> "Ahmad Fuadi dikenal dengan novel-novel inspiratifnya seperti Negeri 5 Menara yang mengisahkan perjuangan pendidikan anak muda.",
        ]);

    }
}
