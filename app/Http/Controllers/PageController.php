<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
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

    public function about()
    {
        return view('pages.about');
    }

}
