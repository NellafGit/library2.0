<?php

namespace App\Service\Admin\Book;

use App\Models\AuthorBook;
use App\Models\Book;

class Service
{
    public function update($data, $authors, $book)
    {
        foreach ($authors as $author) {
            AuthorBook::create([
                'author_id' => $author,
                'book_id' => $book->id,
            ]);
        }
        $book->update($data);
    }

    public function store($data, $authors)
    {
        $book = Book::create($data);
        if ($authors) {
            foreach ($authors['authors'] as $author) {
                AuthorBook::create([
                    'author_id' => $author,
                    'book_id' => $book->id,
                ]);
            }
        }
    }
}
