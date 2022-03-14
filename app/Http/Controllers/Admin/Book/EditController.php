<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Book $book)
    {
        $authors = Author::all();
        $author_list = [];
        foreach ($authors as $author) {
            $author_list[$author->id] = $author->name.' '.$author->surname;
        }
        $choosen_authors = [];
        foreach ($book->authors as $author) {
            $choosen_authors[] = $author->id;
        }

        return view('Admin/Books/edit', compact('book', 'authors', 'choosen_authors', 'author_list'));
    }
}
