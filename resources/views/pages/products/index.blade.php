@extends('layouts.main')

@section('title', 'Products')

@section('content')

    <section class="md:py-10 md:px-20 ">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl md:text-5xl font-bold text-center mb-8 font-serif">Semua Produk</h1>
    
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg hover:translate-y-[-10px] duration-300 shadow p-6">
                        <div class="w-full flex justify-center">
                            <img class="object-contain w-64 h-64 object-center" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"> 
                        </div>
                        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-4">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->slug) }}" class="inline-block bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600">
                            Lihat Detail
                    </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection