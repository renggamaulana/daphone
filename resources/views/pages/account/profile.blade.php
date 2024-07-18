<!-- resources/views/profile.blade.php -->
@extends('layouts.account.account')

@section('title', 'Profile')

@section('main')

    @if (session('success'))
    <div class="block p-3 bg-green-400 text-white font-semibold rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('update-profile') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name">Nama</label>
            <input type="text" value="{{ Auth::user()->name }}" name="name" id="name" class="px-3 py-2 w-full border rounded">
        </div>
        <div class="flex flex-col gap-2">
            <label for="email">Email</label>
            <input type="email" value="{{ Auth::user()->email }}" name="email" id="email" class="px-3 py-2 w-full border rounded">
        </div>
        <div class="flex flex-col gap-2">
            <label for="phone_number">No Telepon</label>
            <input type="text" value="{{ Auth::user()->phone_number }}" name="phone_number" id="phone_number" class="px-3 py-2 w-full border rounded">
        </div>
        <button type="submit" class="px-2 py-1 bg-teal-400 hover:bg-teal-500 mt-3 text-white rounded">Perbarui Profil</button>
    </form>
@endsection