<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function publishBook(Request $request) {
        $book = $this->service->publishBook($request);
        if ($book == null) {
            return response()->json([
                'message' => 'Publish Failed.',
            ], 500);
        }
        return response()->json($book, 201);
    }

    public function getBook(Request $request) {
        return $this->service->getBook($request);
    }

    public function purchaseBook(Request $request) {
        $transactionData = $this->service->purchaseBook($request);

        if ($transactionData == null) {
            return response()->json([
                'message' => 'Book Owned.',
            ], 200);
        }
        return response()->json($transactionData, 201);
    }

    public function readBook(Request $request) {
        return $this->service->readBook($request);
    }
}
