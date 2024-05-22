<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'genre_id',
        'user_id',
        'book_title',
        'book_cover',
        'publish_date',
        'author',
        'preview_page',
        'book_page',
        'book_price',
        'book_file',
    ];
}
