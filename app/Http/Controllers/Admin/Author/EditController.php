<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class EditController extends BaseController
{
   public function __invoke(Author $author)
   {
       return view('Admin/Authors/edit', compact('author'));
   }
}
