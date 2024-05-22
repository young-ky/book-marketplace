<?php

namespace App\Repositories;

use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class GenreRepository
{
    protected $genre;

    public function __construct(Genre $genre)
    {
        $this->genre = $genre;
    }

    public function getAll() {
        return DB::select('SELECT gnr.id AS id, gnr.genre_name AS genre, gnr.genre_image AS image FROM bukuku.genres gnr');
    }
}
