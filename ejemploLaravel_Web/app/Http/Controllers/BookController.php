<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function store(Request $request){
        $book = new Book();
        $book->name = $request->name;
        $book->price = $request->price;
        
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy($id){
        $book = Book::find($id); //::all() -> Eloquent -> ORM, Eloquent es el ORM de laravel Un orm es una capa entre el software y la base de datos 
        $book->delete();         // Sirve para interactuar con la base de datos
        
        return redirect()->route('books.index');
    }

    public function edit($id){
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->name = $request->name;
        $book->price = $request->price;

        $book->save();
        
        return redirect()->route('books.index');
    }

    public function prueba(){
        //$cant_libros = Book::count(); // Contar la cantidad de libros
        //$libro_nombre = Book::where('name', 'Libro #4')->get(); // Buscar libro donde su nombre sea Libro #4
        //$libros_orden_precio = Book::orderBy('price', 'desc')->get(); //Ordenar por precio
        //$libro_take = Book::take(3)->get(); // Tomar los primeros 3 registros
        //$libro_menor_precio = Book::min('price'); // Toma el menor precio
        //$libro_mayor_precio = Book::max('price'); // Toma el mayor precio  where('', '')->first(); toma el primero que encuentre según el criterio de where

        //return $libro_mayor_precio;

        $libros_ordenados = Book::orderBy('price', 'desc')->get();

        return view('parcial1', compact('libros_ordenados'));
    }
}