<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $authors = Author::all();

        return view('Admin/Books/create', compact('authors'));
    }
}
