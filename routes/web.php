<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/books')->group(function () {
    Route::get('/', [App\Http\Controllers\BooksController::class, 'index'])->name('books.index');
    Route::get('/create', [App\Http\Controllers\BooksController::class, 'create'])->name('books.create');
    Route::post('/store', [App\Http\Controllers\BooksController::class, 'store'])->name('books.store');
    Route::get('/{book}', [App\Http\Controllers\BooksController::class, 'show'])->name('books.show');
    Route::get('/{book}/edit', [App\Http\Controllers\BooksController::class, 'edit'])->name('books.edit');
    Route::put('/{book}', [App\Http\Controllers\BooksController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [App\Http\Controllers\BooksController::class, 'destroy'])->name('books.destroy');
});

Route::prefix('/my-books')->group(function () {
    Route::get('/', [App\Http\Controllers\BooksController::class, 'myBooks'])->name('books.my-books');
    Route::post('/{book}', [App\Http\Controllers\BooksController::class, 'add'])->name('books.add');
    Route::delete('/{book}', [App\Http\Controllers\BooksController::class, 'remove'])->name('books.remove');
});

Route::get('/authors', [App\Http\Controllers\BooksController::class, 'showMyAuthor'])->name('authors.index');
