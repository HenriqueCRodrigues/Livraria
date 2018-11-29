<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\BookCustomer;

class AccountController extends Controller
{
    protected function index()
    {
        $cookie = isset($_COOKIE['customer']) ? $_COOKIE['customer'] : null;

        if ($cookie) {
            $customer = BookCustomer::where('custID', '=', json_decode($cookie, true)['custID'])->first();
        }

        return view('account', compact('customer'));
    }

    public function about()
    {
        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();

        return view('about', compact('categories'));
    }
}
