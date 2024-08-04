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
        $totalAmount = 0;

        foreach($cartItems as $item) {
            $totalAmount += $item->product->price;
        }

        return view('pages.checkout.cart', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount
        ]);
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
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('checkout.cart')->with('success', 'Product added to cart successfully.');
    }

    public function buyNow(Product $product)
    {
        $product = $product;
        dd($product);
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

    public function guest()
    {
        return view('pages.checkout.guest');
    }

    public function storeCartData(Request $request)
    {
        // Simpan data keranjang ke session
        $request->session()->put('cartData', $request->cartData);

        return response()->json(['success' => true]);
    }

    public function account(Request $request)
    {
        $cartData = [];

        if (Auth::check()) {
            // Jika sudah login, arahkan ke halaman shipping
            return redirect('/checkout/shipping')->with('cartData', $cartData);
        }

        return view('pages.checkout.account', ['cartData' => $cartData]);
    }

    public function shipping()
    {
        return view('pages.checkout.shipping');
    }

    public function payment()
    {
        return view('pages.checkout.payment');
    }

    public function confirmPayment()
    {
        return view('pages.checkout.confirm-payment');
    }

    public function submitPayment(Request $request)
    {
        return response()->json([
            'data' => $request->all()
        ]);
    }
    

}
