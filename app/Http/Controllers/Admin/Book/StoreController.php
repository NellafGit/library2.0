<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'title' => 'string',
            'year' => 'numeric',
        ]);
        $authors = request()->validate([
            'authors' => 'array',
        ]);
        $book = Book::create($data);
        if ($authors) {
            foreach ($authors['authors'] as $author) {
                AuthorBook::create([
                    'author_id' => $author,
                    'book_id' => $book->id,
                ]);
            }
        }

        return redirect()->route('book.index');
    }
}
