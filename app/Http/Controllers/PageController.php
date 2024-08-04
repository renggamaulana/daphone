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

    public function flashSale()
    {
        return view('pages.flash-sale');
    }

    public function about()
    {
        return view('pages.about');
    }

}
