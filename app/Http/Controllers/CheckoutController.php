<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
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

    public function buyNow(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $userId = Auth::user()->id;
        $user = User::with('addresses')->findOrFail($userId);
        return view('pages.checkout.buy-now', [
            'product' => $product,
            'user' => $user
        ]);
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

    public function shipping(Request $request)
    {
        // if from cart
        $productIds = $request->product_ids;
        $products = Product::whereIn('id', $productIds)->get();

        $totalAmount = 0;
        foreach($products as $product) {
            $totalAmount += $product->price;
        }

        $shippingMethodsArray = [
            [
                'name' => 'JNE',
                'description' => '',
                'delivery_area' => 'Hanya untuk area di luar JADETABEK',
                'handling_time' => '2-4 Hari kerja',
                'price' => 0
            ],
            [
                'name' => 'GoSend/Grab',
                'description' => 'Pengiriman menggunakan GoSend/Grab',
                'delivery_area' => 'Hanya untuk area di luar JADETABEK',
                'handling_time' => '2-4 Hari kerja',
                'price' => 0
            ],
            [
                'name' => 'COD (Cash on Delivery)',
                'description' => 'Cash on Delivery',
                'delivery_area' => 'Hanya untuk pengiriman area Bogor',
                'handling_time' => '2-4 Hari kerja',
                'price' => 0
            ],
            [
                'name' => 'Self Pickup',
                'description' => 'Ambil sendiri',
                'delivery_area' => '',
                'handling_time' => '',
                'price' => 0
            ],

        ];

        $shippingMethods = collect($shippingMethodsArray);
        $userId = Auth::user()->id;
        $user = User::with('addresses')->findOrFail($userId);
        return view('pages.checkout.shipping', [
            'products' => $products,
            'user' => $user,
            'totalAmount' => $totalAmount,
            'shippingMethods' => $shippingMethods
        ]);
    }

    public function payment(Request $request)
    {
        $fromPage = $request->input('from_page');
        $totalAmount = 0;
        $products = collect(); // Gunakan koleksi kosong jika tidak ada produk
        $shipping_method = $request->shipping_method;

        if ($fromPage === 'shipping') {
            $productIds = $request->input('productIds', []);
            $products = Product::whereIn('id', $productIds)->get();
            $totalAmount = $products->sum('price');
        } elseif ($fromPage === 'buyNow') {
            $productId = $request->input('productId');
            $product = Product::findOrFail($productId);
            $products = collect([$product]); // Buat koleksi dengan produk tunggal
            $totalAmount = $product->price;
        }

        return view('pages.checkout.payment', [
            'products' => $products,
            'totalAmount' => $totalAmount
        ]);
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
