<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-genre', [GenreController::class, 'getGenre']);
Route::get('get-book', [BookController::class, 'getBook']);
Route::get('get-collection', [TransactionController::class, 'getCollection']);

Route::post('register', [UserController::class, 'register'])->middleware('guest');
Route::post('login', [UserController::class, 'login'])->middleware('guest');
Route::post('logout', [UserController::class, 'logout'])->middleware(['auth:sanctum']);
Route::post('publish-book', [BookController::class, 'publishBook'])->middleware(['auth:sanctum']);
Route::post('purchase-book', [BookController::class, 'purchaseBook'])->middleware(['auth:sanctum']);
Route::post('read-book', [BookController::class, 'readBook'])->middleware(['auth:sanctum']);
