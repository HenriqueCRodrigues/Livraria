<?php

namespace App\Http\Controllers;

use App\Models\BookDescription;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        return view('homepage');
    }

    public function searchBooks(Request $request)
    {
        $valueRequest = $request->search;
        $books = BookDescription::where('title', 'LIKE', "%".$valueRequest."%")
            ->ORwhere('description', 'LIKE', "%".$valueRequest."%")->get();

        return view('listSearch', compact('books', 'valueRequest'));
    }

    public function getBook($id)
    {
        $book = BookDescription::where('ISBN', '=', $id)->first();

        return view('productPage', compact('book'));
    }


}
