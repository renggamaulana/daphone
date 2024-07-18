<!-- resources/views/profile.blade.php -->
@extends('layouts.account.account')

@section('title', 'Profile')

@section('main')
    @if (session('success'))
    <div class="block p-3 bg-green-400 text-white font-semibold rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('change-password') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="old_password">Password Lama</label>
            <input type="password" name="old_password" id="old_password" placeholder="******" class="px-3 py-2 w-full border rounded">
        </div>
        <div class="flex flex-col gap-2">
            <label for="new_password">Password Baru</label>
            <input type="new_password" name="new_password" id="new_password" placeholder="******" class="px-3 py-2 w-full border rounded">
        </div>
        <div class="flex flex-col gap-2">
            <label for="new_password_confirmation">Konfirmasi Password</label>
            <input type="password" name="new_password_confirmation" placeholder="******" id="new_password_confirmation" class="px-3 py-2 w-full border rounded">
        </div>
        <button type="submit" class="px-2 py-1 bg-teal-400 hover:bg-teal-500 mt-3 text-white rounded">Perbarui Kata Sandi</button>
    </form>
@endsection