<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthorBookController;

//Recreando el CRUD: Create, Read, Update & Delete...
Route::get('/books',[BookController::class, 'index'])->name('books.index')->Middleware('example'); //Se crea el middleware (php artisan make:middleware Name), se registra (en app.php) y se usa en las rutas (web.php)
//Route::get('/books',[BookController::class, 'create'])->name('books.create');
Route::get('/books/{id}',[BookController::class, 'edit'])->name('books.edit');                 // El middleware va en las rutas por temas de rendimiento y no tener que hacer grandes cantidades de validaciones individualmente
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
//Route::get('/books',[BookController::class, 'show'])->name('books.show');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy'); // patch sirve para actualizar como put, la diferencia es que patch actualiza el recurso que se quiere cambiar pero solo recibiendo lo que se va a cambiar estrictamente (un campo o mas pero no todos)
                                                                                         // put, necesita que se llenen todos los campos para actualizar
//Route::resource('books', BookController::class); Simula todas estas rutas anteriores en una sola línea
Route::get('/prueba', [BookController::class, 'prueba'])->name('books.prueba')->Middleware('parcial');

// Recreando el CRUD: Con la tabla autores...
Route::get('/authors',[AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/{id}',[AuthorController::class, 'edit'])->name('authors.edit');
Route::put('/authors/{id}',[AuthorController::class, 'update'])->name('authors.update');
Route::post('/authors',[AuthorController::class, 'store'])->name('authors.store');
Route::delete('/authors/{id}',[AuthorController::class, 'destroy'])->name('authors.destroy');

// CRUD tabla intermedia entre Libro y Autores por la Relación de N a N
Route::get('/author_books',[AuthorBookController::class, 'index'])->name('author_books.index');
Route::get('/author_books/{id}',[AuthorBookController::class, 'edit'])->name('author_books.edit');
Route::put('/author_books/{id}',[AuthorBookController::class, 'update'])->name('author_books.update');
Route::post('/author_books',[AuthorBookController::class, 'store'])->name('author_books.store');
Route::delete('/author_books/{id}',[AuthorBookController::class, 'destroy'])->name('author_books.destroy');


Route::get('/clients', [ClientController::class, 'index']); 

Route::get('/', function () {
    return view('welcome');
});
