<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategoryBook extends Model
{
    protected $table = "bookcategoriesbooks";

    protected $fillable = [
        "ISBN",
        "CategoryID"
    ];
}
