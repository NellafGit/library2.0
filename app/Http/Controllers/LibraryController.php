<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('index', compact('authors'));
    }
}
