<?php

namespace App\Services;

use App\Repositories\GenreRepository;

class GenreService
{
    protected $repository;

    public function __construct(GenreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll() {
        $rawData = $this->repository->getAll();
        $this->datas = array_map(function ($data) {
            return (array) $data;
        }, $rawData);
        return $rawData;
    }
}