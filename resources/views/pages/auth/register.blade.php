@extends('layouts.main')

@section('title', 'Daftar')

@section('content')

    <section class="flex justify-center p-10">
        <div class="border shadow p-5 w-[500px] rounded">
            <h1 class="text-2xl font-bold mb-5">Daftar</h1>

             <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-2">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="name">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="px-3 py-2 w-full border rounded">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="px-3 py-2 w-full border rounded">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="phone_number">Nomor Telepon</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="px-3 py-2 w-full border rounded">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password" class="px-3 py-2 w-full border rounded">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" class="px-3 py-2 w-full border rounded">
                </div>
                <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white text-center text-sm w-full px-3 py-2 mt-2">Daftar</button>
                <div class="flex gap-2 items-center">
                    <div class="h-[1px] w-full bg-gray-200"></div>
                    <span>atau</span>
                    <div class="h-[1px] w-full bg-gray-200"></div>
                </div>
                <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-600 text-center text-sm w-full px-3 py-2 mt-2">Masuk dengan Google</button>
            </form>
            <p class="mt-2 text-center text-gray-500">Punya akun? <a href="{{ route('login') }}" class="underline text-gray-600">Masuk Disini</a></p>
        </div>
    </section>

@endsection