<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class TransactionService
{
    protected $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getCollection($user) {
        return $this->repository->getCollection($user);
    }
}