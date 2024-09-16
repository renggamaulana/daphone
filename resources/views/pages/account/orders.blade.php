<!-- resources/views/profile.blade.php -->
@extends('layouts.account.account')

@section('title', 'Profile')

@section('main')
    <h1 class="text-3xl">Kamu tidak memiliki pesanan!</h1>
    <a href="{{ route('products.index') }}" class="mt-5 text-sm font-semibold text-white bg-teal-400 hover:bg-teal-500 px-2 py-1 rounded">Jelajahi Produk Kami</a>
@endsection
