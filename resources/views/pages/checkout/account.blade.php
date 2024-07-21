@extends('layouts.main')

@section('title', 'Checkout')
@section('content')

    <div class="px-6">
        <div class="container flex flex-wrap gap-6 mt-5">
            <main class="w-full flex-initial md:w-[calc(66.666%-1.5rem)]">
                <section>
                    <a href="" class="focus:outline-none disabled:cursor-not-allowed disabled:opacity-75 flex-shrink-0 font-normal rounded-md text-sm gap-x-1.5 px-2.5 py-1.5 shadow-sm text-white dark:text-gray-900 bg-violet-500 hover:bg-violet-600 disabled:bg-violet-500 dark:bg-violet-400 dark:hover:bg-violet-500 dark:disabled:bg-violet-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-500 dark:focus-visible:outline-violet-400 w-full flex justify-center items-center">Checkout tanpa daftar</a>
                </section>
                <section class="">
                    <div class="border shadow p-5 w-full rounded bg-white">
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
                            {{-- <div class="flex gap-2 items-center">
                                <div class="h-[1px] w-full bg-gray-200"></div>
                                <span>atau</span>
                                <div class="h-[1px] w-full bg-gray-200"></div>
                            </div>
                            <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-600 text-center text-sm w-full px-3 py-2 mt-2">Masuk dengan Google</button> --}}
                        </form>
                        <p class="mt-2 text-center text-gray-500">Punya akun? <a href="{{ route('login') }}" class="underline text-gray-600">Masuk Disini</a></p>
                    </div>
                </section>
            </main>
            <aside class="w-full shrink-0 pb-6 md:w-1/3 md:pb-0">
                <div class="border rounded-lg h-[100px] bg-white">

                </div>
            </aside>
        </div>
    </div>

@endsection