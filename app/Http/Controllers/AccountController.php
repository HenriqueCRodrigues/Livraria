<?php

namespace App\Http\Controllers;

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
}
