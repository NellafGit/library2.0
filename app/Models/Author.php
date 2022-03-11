<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;

    protected $guarded = [];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
