@extends('layouts.main')

@section('title', 'Cart')
@section('content')
    <section class="px-20 my-5">
        <button class="border border-red-600 px-4 py-2 bg-red-500 hover:bg-red-600 text-white">Kembali</button>
        <hr class="my-5">

        <div class="flex gap-10">
            <div class="w-[1200px]">
                <h1 class="text-3xl font-semibold">Keranjang Saya</h1>
                <div class="border border-grey-800 p-10 my-5 bg-white">
                    <div class="flex gap-4">
                        <div class="w-40">
                            <img class="w-[146px] h-[146px] object-cover" src="{{ asset('images/product1.jpg') }}" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <div>
                                <h3 class="text-semibold text-2xl">Samsung Galaxy S4</h3>
                                <p class="text-sm text-grey-400">Kondisi: Good</span>
                                <p class="text-sm text-grey-400">Penjual: FonCell</span>
                            </div>
                            <div>
                                <h4 class="text-xl font-semibold">Rp 3.850.000</h4>
                                <button class="text-xs text-blue-500">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-sm text-gray-500">Kepuasan dijamin atau uang Anda kembali dalam 7 hari.</p>
                <p class="text-sm text-gray-500">Dengan mengonfirmasi pesanan ini, Anda menerima Syarat & Ketentuan dan Kebijakan Privasi kami</p>
            </div>

            <div>
                <h1 class="font-semibold text-3xl">Ringkasan</h1>
                <div class="border border-grey-800 p-10 my-5 bg-white">
                    <span>Total Keranjang: 1</span>
                    <span>Harga : Rp. 3.850.000</span>
                </div> 
            </div>

        </div>

    </section>
@endsection