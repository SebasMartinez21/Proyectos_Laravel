<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();
        $books = Book::all();
        return view('authors', compact('authors', 'books'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $author = new Author();
        $author->name = $request->name;
        $author->born_date = $request->born_date;
        $author->quant_books = $request->quant_books;
        $author->id_book = $request->id_book;

        $author->save();

        return redirect()->route('authors.index');
    }
    
    public function destroy($id){
        $author = Author::find($id);
        $author->delete();

        return redirect()->route('authors.index');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $books = Book::All();
        $author = Author::find($id);
        return view('authors_edit', compact('author', 'books'));
    }

    public function update(Request $request, $id){
        $author = Author::find($id);
        $author->name = $request->name;
        $author->born_date = $request->born_date;
        $author->quant_books = $request->quant_books;
        $author->id_book = $request->id_book;

        $author->save();
        
        return redirect()->route('authors.index');
    }

}
