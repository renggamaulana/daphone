@extends('layouts.main')

@section('title', 'Checkout')
@section('content')

    <div class="px-6">
        <div class="container flex flex-wrap gap-6 mt-5">
            <main class="w-full flex-initial md:w-[calc(66.666%-1.5rem)]">
                <section>
                    <a href="{{ route('checkout.guest') }}" class="focus:outline-none disabled:cursor-not-allowed disabled:opacity-75 flex-shrink-0 font-normal rounded-md text-sm gap-x-1.5 px-2.5 py-1.5 shadow-sm text-white bg-violet-500 hover:bg-violet-600 disabled:bg-violet-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-500 dark:focus-visible:outline-violet-400 w-full flex justify-center items-center">Checkout tanpa daftar</a>
                </section>
                <div class="flex gap-2 items-center py-5">
                    <div class="h-[1px] w-full bg-gray-200"></div>
                    <span>atau</span>
                    <div class="h-[1px] w-full bg-gray-200"></div>
                </div>
                <section class="mb-5">
                    {{-- Register --}}
                    <div id="register-form" class="border shadow p-5 w-full rounded bg-white">
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
                            <a href="{{ route('auth.google') }}" class="bg-red-100 hover:bg-red-200 text-red-600 text-center text-sm w-full px-3 py-2 mt-2">Masuk dengan Google</a>
                        </form>
                        <p class="mt-2 text-center text-gray-500">Punya akun? <button onclick="login()" class="underline text-gray-600">Masuk Disini</a></p>
                    </div>

                    {{-- Login --}}
                    <div id="login-form" class="border shadow p-5 w-full hidden rounded bg-white">
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
                        <p class="mt-2 text-center text-gray-500">Belom punya akun? <button onclick="register()" href="{{ route('register') }}" class="underline text-gray-600">Daftar Disini</button></p>
                    </div>
                </section>
            </main>
            <aside class="w-2/6 flex flex-col gap-5">
                <div class="border rounded-lg p-6 self-start bg-white w-full">
                    <div class="divide-y">
                        <div class="py-3 first:pt-0">
                            <div class="flex items-start">
                                <div class="size-12">
                                    <img src="" alt="img">
                                    {{-- <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"> --}}
                                </div>
                                <div class="pl-1 text-sm">
                                    <p class="font-medium">iPhone 11 - 64 GB - White</p>
                                    <p>Kondisi: Fair</p>
                                </div>
                            </div>
        
                            <div class="mt-2 text-xs">
                                <div class="flex justify-between">
                                    <p>Harga Produk</p>
                                    <p>Rp 5.450.000</p>
                                </div>
                                <div class="flex justify-between">
                                    <p>Jaminan 6 Bulan</p>
                                    <p>Rp 272.500</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between border-t py-3 text-xs">
                            <p>JNE</p>
                            <p>Rp 0</p>
                        </div>
                    </div>
                    <div class="flex justify-between border-t py-3">
                        <h1 class="font-semibold">Total</h1>
                        <p class="font-semibold">Rp 4.500.000</p>
                    </div>
                </div>
                <p class="text-xs text-gray-400">Kepuasan dijamin atau uang Anda kembali dalam 7 hari.Dengan mengonfirmasi pesanan ini, Anda menerima Syarat & Ketentuan dan Kebijakan Privasi kami</p>
            </aside>
        </div>
    </div>

@endsection


@section('script')
    <script>
        const registerForm = document.getElementById('register-form');
        const loginForm = document.getElementById('login-form');

        function login() {
            registerForm.classList.add('hidden');
            loginForm.classList.remove('hidden');
        }

        function register() {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        }
    </script>
@endsection