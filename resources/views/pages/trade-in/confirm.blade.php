@extends('layouts.main')

@section('title', 'Trade-in Confirm')

@section('content')


    <section class="p-10">
        <h1 class="text-4xl font-semibold">Penawaran Tukar Tambah</h1>
        <div class="grid grid-cols-2 gap-10 mt-5">
            <div class="flex flex-col gap-5">
                <div class="flex flex-col border rounded-md bg-white w-full p-3">
                    <div class="flex justify-between p-3 border-b-[1px] border-gray-300 ">
                        <p class="font-semibold">HP Kamu</p>
                        <p class="text-sm">iPhone 13 - 512 GB - Blue</p>
                    </div>
                    <div class="flex justify-between p-3 border-b-[1px] border-gray-300 ">
                        <p class="font-semibold">Resmi Indonesia/Internasional</p>
                        <p class="text-sm">Resmi Indonesia</p>
                    </div>
                    <div class="flex justify-between p-3 border-b-[1px] border-gray-300 ">
                        <p class="font-semibold">Kondisi Layar</p>
                        <p class="text-sm">Perfect: Tidak ada goresan</p>
                    </div>
                    <div class="flex justify-between p-3 border-b-[1px] border-gray-300 ">
                        <p class="font-semibold">Kondisi fisik</p>
                        <p class="text-sm">Very Good: Goresan di fisik tidak terlihat dari jarak 20cm</p>
                    </div>
                    <div class="flex justify-between p-3 border-b-[1px] border-gray-300 ">
                        <p class="font-semibold">Dus</p>
                        <p class="text-sm">Tidak</p>
                    </div>
                    <div class="flex justify-between p-3">
                        <p class="font-semibold">Masalah lain</p>
                        <p class="text-sm">True tone tidak berfungsi (Khusus iPhone)</p>
                    </div>
                </div>
                <div class="flex flex-col border rounded-md bg-white w-full p-3">
                    <div class="flex justify-between p-3 border-b-[1px] border-gray-300 ">
                        <p class="font-semibold">HP Kamu</p>
                        <p class="text-sm">iPhone 13 - 512 GB - Blue</p>
                    </div>
                    <div class="flex justify-between p-3">
                        <p class="font-semibold">Resmi Indonesia/Internasional</p>
                        <p class="text-sm">Resmi Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4 border rounded-md bg-white w-full p-5 self-baseline">
                <div class="flex justify-between">
                    <p class="font-semibold">Harga ponsel lama</p>
                    <p class="text-sm">Rp 11.980.000</p>
                </div>
                <div class="flex justify-between">
                    <p class="font-semibold">Harga ponsel baru</p>
                    <p class="text-sm">Rp 1.280.000</p>
                </div>
                <div class="flex justify-between">
                    <p class="font-semibold">Estimasi jumlah pembayaran</p>
                    <p class="text-sm">-Rp 10.700.000</p>
                </div>
                <p class="text-red-500 text-sm">* Harga yang ditawarkan adalah berdasarkan estimasi harga beli kembali dari ponsel lama Anda. Harga pembelian kembali dapat berbeda tergantung pada kondisi ponsel lama Anda</p>
                <a href="{{ route('trade-in.confirmed') }}" class="w-full bg-teal-400 hover:bg-teal-500 rounded p-2 text-white text-center">Klik untuk konfirmasi</a>
            </div>
        </div>
    </section>
@endsection