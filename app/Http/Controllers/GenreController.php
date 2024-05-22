<?php

namespace App\Http\Controllers;

use App\Services\GenreService;

class GenreController extends Controller
{
    protected $service;

    public function __construct(GenreService $service)
    {
        $this->service = $service;
    }

    public function getGenre() {
        return $this->service->getAll();
    }
}
