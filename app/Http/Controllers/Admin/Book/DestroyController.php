<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke(Book $book)
    {
        AuthorBook::where(['book_id' => $book->id])
            ->delete();
        $book->delete();


        return redirect()->route('book.index');
    }
}
