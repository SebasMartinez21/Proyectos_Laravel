<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AuthorBook;

class Author extends Model
{
    protected $hidden = [
        'created_at',
        'updated-at'
    ];

    public function authorBooks(){
        $this->hasMany(AuthorBook::class, 'id_author');
    }
}
