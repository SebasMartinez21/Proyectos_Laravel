<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Author;

class AuthorBook extends Model
{
    protected $hidden = [
        'created_at',
        'updated-at'
    ];

    public function author() {
        return $this->belongsTo(Author::class, 'id_author');
    }

    public function book() {
        return $this->belongsTo(Book::class, 'id_book');
    }
}
