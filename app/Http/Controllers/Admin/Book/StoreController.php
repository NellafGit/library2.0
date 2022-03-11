<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Models\AuthorBook;
use App\Models\Book;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
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
