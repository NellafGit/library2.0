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
      $this->service->store($data, $authors);
        return redirect()->route('book.index');
    }
}
