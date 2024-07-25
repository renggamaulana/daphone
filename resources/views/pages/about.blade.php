@extends('layouts.main')

@section('title', 'About')

@section('content')
    <div class="flex flex-col">
        <img class="w-full object-cover" src="{{ asset('images/about1.png') }}" alt="about">
        <h1 class="text-center text-5xl font-serif bg-gray-900 text-teal-300 font-bold py-5">Mulai Langkah Pintarmu ✨</h1>
        <img class="w-full object-cover" src="{{ asset('images/about2.png') }}" alt="about2">
    </div>
@endsection