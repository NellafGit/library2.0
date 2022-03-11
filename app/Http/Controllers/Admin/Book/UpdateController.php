<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Book $book)
    {
        AuthorBook::where('book_id', '=', $book->id)->delete();
        $data = request()->validate([
            'title' => 'string',
            'year' => 'numeric',
        ]);
        $authors = request()->input('authors');

        foreach ($authors as $author) {
            AuthorBook::create([
                'author_id' => $author,
                'book_id' => $book->id,
            ]);
        }
        $book->update($data);

        return redirect()->route('book.index');
    }
}
