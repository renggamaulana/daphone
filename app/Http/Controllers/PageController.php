<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $products = Product::get();

        return view('pages.home', [
            'products' => $products
        ]);
    }

    public function allProducts()
    {
        return view('pages.all-products');
    }

    public function flashSale()
    {
        return view('pages.flash-sale');
    }

    public function tradeIn()
    {
        return view('pages.trade-in');
    }

    public function sellPhone()
    {
        return view('pages.sell-phone');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function cart()
    {
        return view('pages.cart');
    }

}
