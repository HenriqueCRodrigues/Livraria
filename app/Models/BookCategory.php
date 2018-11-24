<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookCategory extends Model
{
    protected $table = "bookcategories";

    protected $fillable = [
        "CategoryID",
        "CategoryName"
    ];

    public function books() {
        return $this->hasManyThrough(
            BookDescription::class,
            BookCategoryBook::class,
            'CategoryID', // Foreign key on users table...
            'ISBN', // Foreign key on posts table...
            'CategoryID', // Local key on countries table...
            'ISBN' // Local key on users table...
        );
    }

    public function authors() {
        return DB::table('bookcategories')
            ->join('bookcategoriesbooks','bookcategoriesbooks.CategoryID', '=', 'bookcategories.CategoryID')
            ->join('bookauthorsbooks', 'bookauthorsbooks.ISBN', '=', 'bookcategoriesbooks.ISBN')
            ->join('bookauthors', 'bookauthors.AuthorID', '=', 'bookauthorsbooks.AuthorID')
            ->select([
                'bookauthors.*'
            ])
            ->where('bookcategories.CategoryID', '=', $this->categoryID)
            ->get();
    }
}
