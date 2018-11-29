<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\BookCustomer;
use Illuminate\Http\Request;

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

    public function login(Request $request)
    {
        $customer = BookCustomer::where('email', '=', $request->get('email'))->first();
        setcookie('customer', json_encode($customer), time() + 60 * 24 * 3, '/', NULL, 0);   //3 Dias

        return redirect()->route('conta');
    }

    public function logout()
    {
        setcookie('customer', null, time() + 60 * 24 * 3, '/', NULL, 0);   //3 Dias

        return redirect()->route('conta');
    }
}
