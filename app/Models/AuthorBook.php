<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AuthorBook extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $guarded = [];
    protected $table = 'author_book';

    public $timestamps = false;
}
