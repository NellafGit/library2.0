<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('Admin/Books/index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();

        return view('Admin/Books/create', compact('authors'));
    }

    public function store()
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


    public function edit(Book $book)
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

    public function update(Book $book)
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

    public function destroy(Book $book)
    {
        AuthorBook::where(['book_id' => $book->id])
            ->delete();
        $book->delete();


        return redirect()->route('book.index');
    }

}
