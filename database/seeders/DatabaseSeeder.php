<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //    \App\Models\User::factory(10)->create();
        //     $this->call([
        //         UserSeeder::class,
        //   ]);
        Genre::create([
            'genre_name' => 'Sci-Fi',
            'genre_image' => 'Sci-Fi.jpg'
        ]);
        Genre::create([
            'genre_name' => 'Horror',
            'genre_image' => 'Horror.jpg'
        ]);
        Genre::create([
            'genre_name' => 'Mystery',
            'genre_image' => 'Mystery.jpg'
        ]);
        Genre::create([
            'genre_name' => 'Fantasy',
            'genre_image' => 'Fantasy.jpg'
        ]);
        Genre::create([
            'genre_name' => 'History',
            'genre_image' => 'History.jpg'
        ]);
        Genre::create([
            'genre_name' => 'Self Improvement',
            'genre_image' => 'Self_Improvement.jpg'
        ]);
        Genre::create([
            'genre_name' => 'Light Novel',
            'genre_image' => 'Light_Novel.jpg'
        ]);
        Genre::create([
            'genre_name' => 'Novel',
            'genre_image' => 'Novel.jpg'
        ]);
    }
}
