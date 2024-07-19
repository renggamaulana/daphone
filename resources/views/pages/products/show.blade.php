@extends('layouts.main')


@section('content')

    <section class="p-10">
        <div class="flex gap-5 border rounded-lg bg-white w-full h-screen p-10">
            <div class="w-2/5">
                <img class="rounded" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                <div class="flex gap-3">
                    <span>{{ $product->condition }}</span>
                    <span>{{ $product->signal_status }}</span>
                </div>
            </div>
            <div class="w-3/5 flex flex-col gap-2">
                <h1 class="text-3xl font-semibold">{{ $product->name }}</h1>
                <div>
                    <span class="text-xl text-gray-500 font-semibold">{{ $product->storage }} - {{ $product->color }}</span>
                </div>
                <!-- Tampilkan peringkat saat ini -->
                <div class="mb-2">
                    @if ($product->rating_count > 0)
                        Rated: {{ $product->rating }}/5 ({{ $product->rating_count }} ratings)
                    @else
                        Not rated yet.
                    @endif
                </div>
                <div class="flex">
                    <h3 class="text-3xl font-semibold text-gray-600">Rp {{ number_format($product->price, 2, ',', '.') }}</h3>
                    @if($product->discount)
                        <span>{{ $product->discount }}</span>
                    @endif
                </div>
                <div>
                    <p>Kondisi fisik: <span class="font-semibold"> {{ $product->condition }}</span></p>
                </div>
                <div class="border rounded-lg border-gray-500 w-full p-3 flex">
                    <div class="flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                        </svg>                          
                        <span>Jaminan 7 hari uang kembali</span>
                    </div>
                    <div class="flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                        </svg>                          
                        <span>Sudah termasuk aksesoris baru</span>
                    </div>
                    <div class="flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                        </svg>                          
                        <span>Pengiriman gratis</span>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <form action="{{ route('checkout.add-to-cart', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 w-full">Tambah ke Keranjang</button>
                    </form>
                    <a href="" class="bg-white p-2 border rounded border-red-500 hover:bg-red-100 text-red-500 text-center">Beli Sekarang</a>
                </div>
                
            </div>
        </div>
    </section>

@endsection