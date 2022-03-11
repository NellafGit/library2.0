<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('Admin/Authors/index', compact('authors'));
    }

    public function create()
    {
        return view('Admin/Authors/create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'string',
            'surname' => 'string',
        ]);
        Author::create($data);

        return redirect()->route('author.index');
    }


    public function edit(Author $author)
    {
        return view('Admin/Authors/edit', compact('author'));
    }

    public function update(Author $author)
    {
        $data = request()->validate([
            'name' => 'string',
            'surname' => 'string',
        ]);
        $author->update($data);

        return redirect()->route('author.index');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('author.index');
    }

}
