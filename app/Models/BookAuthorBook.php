<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthorBook extends Model
{
    protected $table = "bookauthorsbooks";

    protected $fillable = [
        "ISBN",
        "AuthorID"
    ];
}
