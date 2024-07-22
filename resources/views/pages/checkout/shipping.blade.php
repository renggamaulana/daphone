@extends('layouts.main')

@section('title', 'Shipping')

@section('content')
    <div class="p-10 flex gap-4">
        <main class="w-4/6 border rounded-lg bg-white p-10">
            <h1>Alamat Pengiriman</h1>
            <div class="flex flex-col gap-2">
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="border rounded px-2 py-1">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="phone_number">No Telepon</label>
                        <input type="text" name="phone_number" id="phone_number" class="border rounded px-2 py-1">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-2">
                        <label for="address">Alamat</label>
                        <input type="text" name="address" id="address" class="border rounded px-2 py-1">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="postal_code">Kode Pos</label>
                        <input type="text" name="postal_code" id="postal_code" class="border rounded px-2 py-1">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="district">Kecamatan/Kelurahan</label>
                    <input type="text" name="district" id="district" class="border rounded px-2 py-1">
                </div>
            </div>
        </main>

        <aside class="w-2/6 flex flex-col gap-5">
            <div class="border rounded-lg p-6 self-start bg-white w-full">
                <div class="divide-y">
                    <div class="py-3 first:pt-0">
                        <div class="flex items-start">
                            <div class="size-12">
                                <img src="" alt="img">
                                {{-- <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"> --}}
                            </div>
                            <div class="pl-1 text-sm">
                                <p class="font-medium">iPhone 11 - 64 GB - White</p>
                                <p>Kondisi: Fair</p>
                            </div>
                        </div>
    
                        <div class="mt-2 text-xs">
                            <div class="flex justify-between">
                                <p>Harga Produk</p>
                                <p>Rp 5.450.000</p>
                            </div>
                            <div class="flex justify-between">
                                <p>Jaminan 6 Bulan</p>
                                <p>Rp 272.500</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between border-t py-3 text-xs">
                        <p>JNE</p>
                        <p>Rp 0</p>
                    </div>
                </div>
                <div class="flex justify-between border-t py-3">
                    <h1 class="font-semibold">Total</h1>
                    <p class="font-semibold">Rp 4.500.000</p>
                </div>
            </div>
            <div class="py-3 flex">
                <a href="{{ route('checkout.payment') }}" class="w-full text-center px-3 py-1 bg-purple-500 hover:bg-purple-600 text-white rounded-lg">Pilih Metode Pembayaran</a>
            </div>
        </aside>

    </div>

@endsection