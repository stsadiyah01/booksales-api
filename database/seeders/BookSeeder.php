<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title'=>'Laskar Pelangi',
            'description'=> ' Novel inspiratif karya Andrea Hirata yang mengisahkan perjuangan anak-anak Belitung dalam menempuh pendidikan.',
            'price'=> 85000,
            'stok'=> 50,
            'cover_photo'=> 'laskar_pelangi.jpg',
            'genre_id'=> 2,
            'author_id'=> 1,
        ]);
        
        Book::create([
            'title' => 'Petualangan Si Pitung',
            'description'=> 'Cerita legendaris tentang pahlawan Betawi yang menentang ketidakadilan.',
            'price'=> 75000,
            'stok'=> 30,
            'cover_photo'=> 'si_pitung.jpg',
            'genre_id'=> 1,
            'author_id'=> 2,
        ]);

        Book::create([
            'title' => 'Dunia Fantasi',
            'description'=> 'Kisah fantasi penuh sihir dan petualangan di dunia magis yang menakjubkan.',
            'price'=> 90000,
            'stok'=> 40,
            'cover_photo'=> 'dunia_fantasi.jpg',
            'genre_id'=> 3,
            'author_id'=> 3,
        ]);

        Book::create([
            'title' => 'Cinta Tak Terduga',
            'description'=> 'Novel romantis tentang perjalanan cinta dua insan yang tak sengaja bertemu.',
            'price'=> 80000,
            'stok'=> 35,
            'cover_photo'=> 'cinta_tak_terduga.jpg',
            'genre_id'=> 2,
            'author_id'=> 4,
        ]);

        Book::create([
            'title' => 'Pertarungan Terakhir',
            'description'=> 'Cerita aksi menegangkan tentang pahlawan yang menghadapi musuh kuat demi keadilan.',
            'price'=> 88000,
            'stok'=> 45,
            'cover_photo'=> 'pertarungan_terakhir.jpg',
            'genre_id'=> 1,
            'author_id'=> 5,
        ]);

    }
}
