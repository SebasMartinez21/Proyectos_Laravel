<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books', compact('books'));
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
        return view('books_edit', compact('book'));
    }

    public function update(Request $request, $id){
        $book = Book::find($id);
        $book->name = $request->name;
        $book->price = $request->price;

        $book->save();
        
        return redirect()->route('books.index');
    }
}