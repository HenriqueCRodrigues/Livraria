<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookAuthor extends Model
{
    protected $table = "bookauthors";

    protected $fillable = [
        "AuthorID",
        "nameF",
        "nameL"
    ];

    public function getFullNameAttribute()
    {
        return $this->nameF." ".$this->nameF;
    }

    public function books() {
        return $this->hasManyThrough(
            BookDescription::class,
            BookAuthorBook::class,
            'AuthorID', // Foreign key on users table...
            'ISBN', // Foreign key on posts table...
            'AuthorID', // Local key on countries table...
            'ISBN' // Local key on users table...
        );
    }

    public function categories() {
        return DB::table('bookauthors')
            ->join('bookauthorsbooks', 'bookauthorsbooks.AuthorID', '=', 'bookauthors.AuthorID')
            ->join('bookcategoriesbooks','bookcategoriesbooks.ISBN', '=', 'bookauthorsbooks.ISBN')
            ->join('bookcategories', 'bookcategories.CategoryID', '=', 'bookcategoriesbooks.CategoryID')
            ->select([
                'bookcategories.*'
            ])
            ->where('bookauthors.AuthorID', '=', $this->AuthorID)
            ->get();
    }
}
