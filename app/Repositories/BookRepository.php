<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BookRepository
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function publishBook(Request $request)
    {
        $book = null;
        try {
            $latestId = DB::table('books')->latest('id')->select('id')->first();
            $bookId = 1;
            if($latestId != null) {
                $bookId = $latestId->id + 1;
            }

            $request->bookCover->store('book_covers/' . $request->genreId . '/' . $request->userId . '/' . $bookId, 'public');
            $request->bookFile->store('book_files/' . $request->genreId . '/' . $request->userId . '/' . $bookId, 'local');
            $book = Book::create([
                'id' => $bookId,
                'genre_id' => $request->genreId,
                'user_id' => $request->userId,
                'book_title' => $request->bookTitle,
                'book_cover' => $request->bookCover->hashName(),
                'publish_date' => now(),
                'author' => $request->bookAuthor,
                'preview_page' => $request->previewPage,
                'book_page' => $request->bookPage,
                'book_price' => $request->bookPrice,
                'book_file' => $request->bookFile->hashName()
            ]);
        }
        catch (Throwable $e) {
            report($e);
        }
        return $book;
    }

    public function getBook($data) {
        return DB::table('books')->where('genre_id', $data->genreId)->get();
    }

    public function purchaseBook($credential) {
        $user = $credential->user();
        $checkData = DB::select(
            'SELECT bk.id, ts.user_id
            FROM bukuku.books bk
            INNER JOIN bukuku.transactions ts
            ON ts.book_id = bk.id
            INNER JOIN bukuku.users us
            ON ts.user_id = us.id
            WHERE ts.user_id = :userId
            AND ts.book_id = :bookId',
            [
                "userId" => $user->id,
                "bookId" => $credential->id
            ]
        );

        if(!$checkData) {
            $transactionData = Transaction::create([
                'user_id' => $credential->user_id,
                'book_id' => $credential->id,
                'checkout_price' => $credential->book_price,
                // 'payment_status' => $request->payment_status,
                'payment_status' => 'complete',
                // 'payment_method' => $request->payment_method,
                'payment_method' => 'cash'
            ]);
            return $transactionData;
        }
        return;
    }

    public function readBook($data) {
        $data = $data;
        $data->mime_type = explode(".", $data->book_file);
        $file_64_encoded = base64_encode(Storage::get("book_files/" . $data->genre_id . "/" . $data->user_id . "/" . $data->id . "/" . $data->book_file));
        return response()->json($file_64_encoded, 200);
    }
}
