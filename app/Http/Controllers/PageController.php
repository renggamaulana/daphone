<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $productsArray = [
            [
                "name" => 'Samsung Galaxy S23 FE 8GB/256GB Mint',
                "price" => 6500000,
                "grade" => 'Mulus',
                "color" => 'Mint',
                "condition" => 'Second',
                'category' => 'best-seller'
            ],
            [
                "name" => 'Apple iPhone 13 128GB Blue',
                "price" => 12000000,
                "grade" => 'Mulus',
                "color" => 'Blue',
                "condition" => 'Second',
                'category' => 'best-seller'
            ],
            [
                "name" => 'Google Pixel 6 128GB Black',
                "price" => 8000000,
                "grade" => 'Mulus',
                "color" => 'Black',
                "condition" => 'Second',
                'category' => 'best-seller'
            ],
        ];

        $products = [];

        foreach ($productsArray as $productArray) {
            $products[] = (object) $productArray;
        }

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

    public function about()
    {
        return view('pages.about');
    }

    public function cart()
    {
        return view('pages.cart');
    }

}
