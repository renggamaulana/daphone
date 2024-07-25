@extends('layouts.main')

@section('title', 'Masuk')

@section('content')

    <section class="flex justify-center p-10 ">
        <div class="border shadow p-5 w-[500px] rounded bg-white">
            <h1 class="text-2xl font-bold mb-5">Masuk</h1>

            <form action="" method="POST" class="flex flex-col gap-2">
                @csrf
                <div class="flex flex-col gap-1">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="px-3 py-2 w-full border rounded">
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="px-3 py-2 w-full border rounded">
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white text-center text-sm w-full px-3 py-2 mt-2">Masuk</button>
                <div class="flex gap-2 items-center">
                    <div class="h-[1px] w-full bg-gray-200"></div>
                    <span>atau</span>
                    <div class="h-[1px] w-full bg-gray-200"></div>
                </div>
                <a href="{{ route('auth.google') }}" class="bg-red-100 hover:bg-red-200 text-red-600 text-center text-sm w-full px-3 py-2 mt-2">Masuk dengan Google</a>
            </form>
            <p class="mt-2 text-center text-gray-500">Belom punya akun? <a href="{{ route('register') }}" class="underline text-gray-600">Daftar Disini</a></p>
        </div>
    </section>

@endsection