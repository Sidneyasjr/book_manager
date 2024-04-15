<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('me', [AuthController::class, 'me']);
    Route::apiResource('books', BookController::class);
    Route::apiResource('authors', AuthorController::class);
});
