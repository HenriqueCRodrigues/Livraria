<?php

namespace App\Http\Controllers;

use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Models\BookDescription;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        $randomBooks = BookDescription::limit(4)->inRandomOrder()->get();

        return view('homepage', compact('categories', 'randomBooks'));
    }

    public function searchBooks(Request $request)
    {
        $valueRequest = $request->search;
        $books = BookDescription::where('title', 'LIKE', "%".$valueRequest."%")
            ->ORwhere('description', 'LIKE', "%".$valueRequest."%")->with('authors')->get();

        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        return view('listBookBy', compact('books', 'valueRequest', 'categories'));
    }

    public function getBook($id)
    {
        $book = BookDescription::where('ISBN', '=', $id)->with('authors')->first();

        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();

        return view('productPage', compact('book', 'categories'));
    }

    public function getBooksByAuthor(Request $request)
    {
        $author = BookAuthor::where('AuthorID', '=', $request->id)->with('books')->first();
        $books = $author->books;
        $valueRequest = $author->fullName;

        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        return view('listBookBy', compact('books', 'valueRequest', 'categories'));

    }

    public function getBooksByCategory($id, $nameRequest)
    {
        $categories = BookCategory::all();
        $books = [];
        $valueRequest = $nameRequest;

        foreach ($categories as $category) {
            if($category->CategoryID == $id) {
                $books = $category->books;
                break;
            }
        }



        return view('listBookBy', compact('books', 'valueRequest', 'categories'));
    }

}

