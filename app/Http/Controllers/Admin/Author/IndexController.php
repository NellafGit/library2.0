<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $authors = Author::all();

        return view('Admin/Authors/index', compact('authors'));

    }
}
