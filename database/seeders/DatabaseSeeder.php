<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\BookSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
        

    }
}
