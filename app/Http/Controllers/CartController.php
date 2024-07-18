<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
{
    $cart = session()->get('cart', []);
    
    // Tambahkan produk ke keranjang
    if(isset($cart[$productId])) {
        $cart[$productId]['quantity']++;
    } else {
        $product = Product::find($productId);
        $cart[$productId] = [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'image' => $product->image
        ];
    }
    
    session()->put('cart', $cart);
    
    return redirect()->back()->with('success', 'Product added to cart!');
}

// Mengambil item dari keranjang
public function getCart()
{
    $cart = session()->get('cart', []);
    return view('cart.index', compact('cart'));
}

// Menghapus item dari keranjang
public function removeFromCart($productId)
{
    $cart = session()->get('cart', []);
    
    if(isset($cart[$productId])) {
        unset($cart[$productId]);
        session()->put('cart', $cart);
    }
    
    return redirect()->back()->with('success', 'Product removed from cart!');
}
}
