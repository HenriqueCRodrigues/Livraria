<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookDescription extends Model
{
    protected $table = "bookdescriptions";

    protected $fillable = [
        "ISBN",
        "title",
        "description",
        "price",
        "publisher",
        "pubdate",
        "edition",
        "pages"
    ];

    public function getDiscountAttribute()
    {
        return $this->discount = number_format($this->price * 0.2, 2, '.', ',');
    }

    public function getDiscountValueAttribute()
    {
        return number_format($this->price - $this->discount, 2, '.', ',');
    }

    public function authors() {
        return $this->hasManyThrough(
            BookAuthor::class,
            BookAuthorBook::class,
            'ISBN', // Foreign key on users table...
            'AuthorID', // Foreign key on posts table...
            'ISBN', // Local key on countries table...
            'AuthorID' // Local key on users table...
        );
    }

    public function category() {
        return $this->hasManyThrough(
            BookCategory::class,
            BookCategoryBook::class,
            'ISBN', // Foreign key on users table...
            'CategoryID', // Foreign key on posts table...
            'ISBN', // Local key on countries table...
            'CategoryID' // Local key on users table...
        )->first();
    }


}
