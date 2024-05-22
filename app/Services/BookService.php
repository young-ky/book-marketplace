<?php

namespace App\Services;

use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookService
{
    protected $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function publishBook(Request $request) {
        $request->validate([
            'bookTitle' => ['required'],
            'previewPage' => ['required'],
            'bookPrice' => ['required'],
            'bookAuthor' => ['required'],
            'genreId' => ['required'],
            'userId' => ['required'],
            'bookCover' => ['required'],
            'bookFile' => ['required'],
            'bookPage' => ['required'],
        ]);
        return $this->repository->publishBook($request);
    }

    public function getBook($data) {
        return $this->repository->getBook($data);
    }

    public function purchaseBook($credential) {
        return $this->repository->purchaseBook($credential);
    }

    public function readBook($data) {
        return $this->repository->readBook($data);
    }
}