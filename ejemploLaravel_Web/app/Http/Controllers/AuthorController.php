<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::all();
        return view('authors', compact('authors'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $author = new Author();
        $author->name = $request->name;
        $author->born_date = $request->born_date;

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
        $author = Author::find($id);
        return view('authors_edit', compact('author'));
    }

    public function update(Request $request, $id){
        $author = Author::find($id);
        $author->name = $request->name;
        $author->born_date = $request->born_date;

        $author->save();
        
        return redirect()->route('authors.index');
    }

}
