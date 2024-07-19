@extends('layouts.main')

@section('title', 'Products')

@section('content')

    <section class="py-10 px-20">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-center mb-8">All Products</h1>
    
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow p-6">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg mb-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-4">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="inline-block bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection