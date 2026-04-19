<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthorBook;
use App\Models\Book;
use App\Models\Author;

class AuthorBookController extends Controller{

    public function index(){
        $authors = Author::all();
        $books = Book::all();
        //$author_books = AuthorBook::all();
        $author_books = AuthorBook::with(['author', 'book'])->get();    


        return view('author_books.index', compact('author_books', 'books', 'authors'));
    }

    public function create(){}

    public function store(Request $request)
    {
        $author_book = new AuthorBook();
        $author_book->id_book = $request->id_book;
        $author_book->id_author = $request->id_author;
        $author_book->date = $request->date;

        $author_book->save();

        return redirect()->route('author_books.index');
    }

    public function show(AuthorBook $authorBook){}

    public function edit($id){
        $authors = Author::all();
        $books = Book::all();
        $author_book = AuthorBook::find($id);

        return view('author_books.edit', compact('author_book', 'authors', 'books'));
    }

    public function update(Request $request, $id){
        $author_book = AuthorBook::find($id);
        $author_book->id_book = $request->id_book;
        $author_book->id_author = $request->id_author;
        $author_book->date = $request->date;

        $author_book->save();

        return redirect()->route('author_books.index');
    }

    public function destroy($id){
        $author_book = AuthorBook::find($id);
        $author_book->delete();

        return redirect()->route('author_books.index');
    }
}
