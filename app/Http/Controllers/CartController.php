<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\BookDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        $cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
        $qtyAll = 0;

        if ($cart) {
            $carts = json_decode($cart, true)['order'];
            $qtyAll = json_decode($cart, true)['qtyAll'];
        }

        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        return view('shoppingCart', compact('categories', 'carts', 'qtyAll'));
    }

    public function add($ISBN)
    {
        $carts = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true)['order'] : null;
        $qtyAll = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true)['qtyAll'] : 0;

        if ($ISBN) {
            $book = BookDescription::where('ISBN', '=', $ISBN)->first();
            if ($book) {
                $insert = [
                    'ISBN' => $book->ISBN,
                    'title' => $book->title,
                    'price' => $book->price,
                    'qty' => 1,
                    'total' => $book->price,
                ];

                if (!$carts) {
                    $carts[] = $insert;
                } else {
                    $add = false;
                    foreach ($carts as $index => $cart) {
                        if ($cart['ISBN'] == $insert['ISBN']) {
                            $carts[$index]['qty'] += 1;
                            $carts[$index]['total'] += $book->price;
                            $add = true;
                            break;
                        }
                    }

                    if (!$add) {
                        $carts[] = $insert;
                    }
                }

                $qtyAll += 1;
                setcookie('cart', json_encode(["order" => $carts, "qtyAll" => $qtyAll]), time() + 60 * 24 * 3, '/', NULL, 0 );  //3 Dias
            }
        }

        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        return view('shoppingCart', compact('categories', 'carts', 'qtyAll'));
    }

    public function delete($ISBN)
    {
        $carts = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true)['order'] : null;
        $qtyAll = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true)['qtyAll'] : 0;

        $book = BookDescription::where('ISBN', '=', $ISBN)->first();

        if ($book && $carts) {
            foreach ($carts as $index => $cart) {
                if($cart['qty'] > 1 && $cart['ISBN'] == $book->ISBN) {
                    $carts[$index]['qty'] -= 1;
                    $carts[$index]['total'] -= $book->price;
                } else if($cart['ISBN'] == $book->ISBN && $cart['qty'] == 1) {
                    unset($carts[$index]);
                }

            }

            $qtyAll -= 1;
            setcookie('cart', json_encode(["order" => $carts, "qtyAll" => $qtyAll]), time() + 60 * 24 * 3, '/', NULL, 0 );   //3 Dias
        }


        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        return view('shoppingCart', compact('categories', 'carts', 'qtyAll'));
    }
}
