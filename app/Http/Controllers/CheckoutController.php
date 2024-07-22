<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function cart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        return view('pages.checkout.cart', compact('cartItems'));
    }

    public function addToCart(Product $product)
    {
        // Cek apakah produk sudah ada di keranjang pengguna
        $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $product->id)
        ->first();

        if ($cart) {
            // Jika sudah ada, tidak perlu melakukan apa-apa karena satu klik "Add to Cart" menambahkan satu produk
        } else {
            // Jika belum ada, tambahkan produk ke keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('checkout.cart')->with('success', 'Product added to cart successfully.');
    }

    public function deleteCart(Cart $cart)
    {
        // Pastikan item keranjang yang akan dihapus milik user yang sedang login
        if ($cart->user_id === Auth::id()) {
            $cart->delete();
            return redirect()->route('checkout.cart')->with('success', 'Barang berhasil dihapus dari keranjang');
        }

        return redirect()->route('cart.index')->with('error', 'Tidak dapat menghapus barang');
    }

    public function account()
    {
        return view('pages.checkout.account');
    }

    public function shipping()
    {
        return view('pages.checkout.shipping');
    }

    public function payment()
    {
        return view('pages.checkout.payment');
    }
    

}
