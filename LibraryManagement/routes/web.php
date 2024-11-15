<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\CdController;
use App\Http\Controllers\NewspaperController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, "index"])->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:admin,librarian'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/books/{sort?}', [BookController::class, 'index'])->name('books');
    Route::get('/journals/{sort?}', [JournalController::class, 'index'])->name('journals');
    Route::get('/cds/{sort?}', [CdController::class, 'index'])->name('cds');
    Route::get('/newspapers/{sort?}', [NewspaperController::class, 'index'])->name('newspapers');
});

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:admin'])->group(function () {
    Route::get('/librarians', function () {
        return view('admin.userPage');
    });
});

Route::middleware(['auth', 'App\Http\Middleware\LevelCheck:librarian'])->group(function () {
    Route::get('/display', function () {
        redirect('books');
    })->name('display');
});


require __DIR__ . '/auth.php';