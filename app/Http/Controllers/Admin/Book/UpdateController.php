<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(Book $book, UpdateRequest $request)
    {
        AuthorBook::where('book_id', '=', $book->id)->delete();
        $data = $request->validated();
        $authors = $request->input('authors');

       $this->service->update($data, $authors, $book);

        return redirect()->route('book.index');
    }
}
