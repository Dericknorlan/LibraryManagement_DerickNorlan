<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CDController;
use App\Http\Controllers\FYPController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\NewsPapersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/{sort?}', [BooksController::class, 'index']);
Route::get('/cd/{sort?}', [CDController::class, 'index']);
Route::get('/finalYearProject/{sort?}', [FYPController::class, 'index']);
Route::get('/journals/{sort?}', [JournalController::class, 'index']);
Route::get('/newspapers/{sort?}', [NewsPapersController::class, 'index']);
