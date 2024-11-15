<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});


// Route resource for books
Route::resource('/books', \App\Http\Controllers\BookController::class);
Route::resource('/journals', \App\Http\Controllers\JournalController::class);
Route::resource('/cds', \App\Http\Controllers\CdController::class);
Route::resource('/newspapers', \App\Http\Controllers\NewspaperController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class,'index'])->
    middleware(['auth','admin']);


// Register Route



use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);



Route::get('/welcome', function () {
    return view('welcome'); // Ganti dengan view yang sesuai, misalnya dashboard
})->name('welcome');



