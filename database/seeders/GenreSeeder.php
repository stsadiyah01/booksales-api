<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
   
    public function run(): void
    {
         Genre ::create([
        'name'=>'action',
        'description'=> 'Genre yang menekankan pada adegan aksi, pertempuran, dan kecepatan.'
    ]);

        Genre::create([
            'name'=> 'Romace',
            'description'=> 'Genre yang menekankan pada hubungan romantis dan percintaan.'
        ]);

         Genre::create([
            'name'=> 'Fantasy',
            'description'=> 'Genre yang mengeksplorasi imajinasi dan dunia tak nyata.'
        ]);


    }
}
