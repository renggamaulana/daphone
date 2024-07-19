<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('pages.products.index', [
            'products' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.products.show', [
            'product' => $product
        ]);
    }
}
