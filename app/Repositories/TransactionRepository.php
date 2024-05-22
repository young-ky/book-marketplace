<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getCollection($user) {
        return DB::select(
            'SELECT book_title, book_cover, publish_date, author, book_file, genre_id, bk.id, bk.user_id
            FROM bukuku.books bk
            INNER JOIN bukuku.transactions ts
            ON ts.book_id = bk.id
            INNER JOIN bukuku.users us
            ON ts.user_id = us.id
            WHERE ts.user_id = :userId', ["userId" => $user->id]
        );
    }
}
