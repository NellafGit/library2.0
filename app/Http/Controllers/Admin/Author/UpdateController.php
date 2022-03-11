<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Author $author)
    {
        $data = request()->validate([
            'name' => 'string',
            'surname' => 'string',
        ]);
        $author->update($data);

        return redirect()->route('author.index');
    }
}
