<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use App\Models\BookCustomer;
use App\Models\BookDescription;
use App\Models\BookOrder;
use App\Models\BookOrderItem;
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
                setcookie('cart', json_encode(["order" => $carts, "qtyAll" => $qtyAll]), time() + 60 * 24 * 3, '/', NULL, 0);  //3 Dias
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
                if ($cart['qty'] > 1 && $cart['ISBN'] == $book->ISBN) {
                    $carts[$index]['qty'] -= 1;
                    $carts[$index]['total'] -= $book->price;
                } else if ($cart['ISBN'] == $book->ISBN && $cart['qty'] == 1) {
                    unset($carts[$index]);
                }

            }

            $qtyAll -= 1;
            setcookie('cart', json_encode(["order" => $carts, "qtyAll" => $qtyAll]), time() + 60 * 24 * 3, '/', NULL, 0);   //3 Dias
        }


        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        return view('shoppingCart', compact('categories', 'carts', 'qtyAll'));
    }

    public function checkout()
    {
        $cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
        $qtyAll = 0;

        if ($cart) {
            $carts = json_decode($cart, true)['order'];
            $qtyAll = json_decode($cart, true)['qtyAll'];
        }

        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();
        return view('checkout', compact('categories', 'carts', 'qtyAll'));
    }

    public function accountCheckout(Request $request)
    {
        $cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
        $qtyAll = 0;

        if ($cart) {
            $carts = json_decode($cart, true)['order'];
            $qtyAll = json_decode($cart, true)['qtyAll'];
        }

        $categories = BookCategory::orderBy('CategoryName', 'asc')->get();

        $customer = BookCustomer::where('email', '=', $request->get('email'))->first();

        if (!$customer) {
            $customer = new BookCustomer();
            $customer->email = $request->get('email');
        }

        return view('checkout02', compact('categories', 'carts', 'qtyAll', 'customer'));
    }

    public function finalize(Request $request)
    {
        $customer = BookCustomer::where('custID', '=', $request->get('custID'))->first();

        if (!$customer) {
            $customer = new BookCustomer();
        }

        $customer->fill($request->only([
            "fname",
            "lname",
            "email",
            "street",
            "city",
            "state",
            "zip",
        ]));

        $customer->save();

        setcookie('customer', json_encode($customer), time() + 60 * 24 * 3, '/', NULL, 0);   //3 Dias

        $order = new BookOrder();
        $order->custID = $customer->custID;
        $order->orderdate = time();
        $order->save();


        $cart = isset($_COOKIE['cart']) ? $_COOKIE['cart'] : null;
        $qtyAll = 0;

        if ($cart) {
            $carts = json_decode($cart, true)['order'];
            $qtyAll = json_decode($cart, true)['qtyAll'];
        }

        foreach ($carts as $c) {
            BookOrderItem::create([
                'orderID' => $order->orderID,
                'ISBN' => $c['ISBN'],
                'qty' => $c['qty'],
                'price' => $c['price'],
            ]);
        }

        setcookie('cart', json_encode([
            "order" => null,
            "qtyAll" => null
        ]), time() + 60 * 24 * 3, '/', NULL, 0);   //3 Dias

        return redirect(route('conta'));
    }
}
