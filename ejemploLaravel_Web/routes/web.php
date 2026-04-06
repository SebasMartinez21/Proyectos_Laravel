<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthorController;

// Recreando el CRUD: Create, Read, Update & Delete...
Route::get('/books',[BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}',[BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// Recreando el CRUD: Con la tabla autores...
Route::get('/authors',[AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/{id}',[AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{id}',[AuthorController::class, 'update'])->name('authors.update');
Route::post('/authors',[AuthorController::class, 'store'])->name('authors.store');
Route::delete('/authors/{id}',[AuthorController::class, 'destroy'])->name('authors.destroy');




Route::get('/clients', [ClientController::class, 'index']); 

Route::get('/', function () {
    return view('welcome');
});
