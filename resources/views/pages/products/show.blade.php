@extends('layouts.main')

@section('title', 'Product Detail')

@section('content')

    <section class="px-6 pb-6 mt-6">
        <div class="border rounded-lg bg-white w-full p-10">
            <div class="flex gap-5">
                <div class="w-2/5 relative grow-0 basis-full md:basis-2/5">
                    @if(count($product->images) > 0)
                        <div class="relative max-w-[300px] m-auto">
                            @foreach($product->images as $productImage)
                                <div class="my-slides fade">
                                    <img class="max-h-[300px] mx-auto object-cover"" src="{{ Storage::url($productImage->image_path) }}" alt="{{ $product->name }}">
                                    <div class="flex gap-3 relative justify-center mt-1">
                                        <span class="bg-gray-200 py-1 px-3 rounded-lg">{{ $product->guarantee }}</span>
                                        <span class="bg-gray-200 py-1 px-3 rounded-lg">{{ $product->signal_status }}</span>
                                    </div>
                                </div>
                            @endforeach
                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>
                        </div>
                        <div class="text-center mt-2">
                            <span class="dot" onclick="currentSlide(1)"></span> 
                            <span class="dot" onclick="currentSlide(2)"></span> 
                        </div>
                    @else
                        <img class="max-h-[300px] mx-auto object-cover"" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                        <div class="flex gap-3 relative">
                            <span>{{ $product->guarantee }}</span>
                            <span>{{ $product->signal_status }}</span>
                        </div>
                    @endif
                </div>
                <div class="w-3/5 flex flex-col gap-2">
                    <h1 class="text-3xl font-semibold">{{ $product->name }}</h1>
                    <div>
                        <span class="text-xl text-gray-500 font-semibold">{{ $product->storage }} - {{ $product->color }}</span>
                    </div>
                    <!-- Tampilkan peringkat saat ini -->
                    {{-- <div class="mb-2">
                        @if ($product->rating_count > 0)
                            Rated: {{ $product->rating }}/5 ({{ $product->rating_count }} ratings)
                        @else
                            Belum ada ulasan
                        @endif
                    </div> --}}
                    <div class="flex">
                        <h3 class="text-3xl font-semibold text-gray-600">Rp {{ number_format($product->price, 2, ',', '.') }}</h3>
                        @if($product->discount)
                            <span>{{ $product->discount }}</span>
                        @endif
                    </div>
                    <div>
                        <p>Kondisi fisik: <span class="font-semibold"> {{ $product->condition }}</span></p>
                    </div>
                    <div class="mb-2 flex flex-wrap divide-y rounded-lg border md:flex-nowrap md:divide-x md:divide-y-0">
                        <div class="flex basis-full items-start gap-2 p-3 text-sm md:flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>                          
                            <span>Jaminan 7 hari uang kembali</span>
                        </div>
                        <div class="flex basis-full items-start gap-2 p-3 text-sm md:flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>                          
                            <span>Sudah termasuk aksesoris baru</span>
                        </div>
                        <div class="flex basis-full items-start gap-2 p-3 text-sm md:flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>                          
                            <span>Pengiriman gratis</span>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <form action="{{ route('checkout.add-to-cart', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600 w-full">Tambah ke Keranjang</button>
                        </form>
                        <form action="{{ route('checkout.buy-now', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-white p-2 border rounded border-red-500 hover:bg-red-100 text-red-500 text-center">Beli Sekarang</button>
                        </form>
                        {{-- <a href="{{ route('checkout.buy-now', $product->id) }}" class="bg-white p-2 border rounded border-red-500 hover:bg-red-100 text-red-500 text-center">Beli Sekarang</a> --}}
                    </div>
                </div>
            </div>
            <hr class="my-8">
            <div>   
                <h1 class="font-serif text-2xl font-semibold">90+ fungsi telah diuji oleh Jagofon pada semua produk, termasuk:</h1>
                <div class="flex justify-between mt-3">
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Deteksi Komponen Non-Original</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Kamera</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Jaringan</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>GPS</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Touch/Face ID</span>                           
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Baterai (Minimum 80%)</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>WiFi</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Speaker & Mikrofon</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Layar LCD</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Biometrik</span>                           
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Semua Tombol</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Bluetooth</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Pembaca Kartu SIM & IMEI</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>Sensor</span>                           
                        </div>
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-teal-400">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                            </svg>   
                            <span>USB</span>                           
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-8">
            <div>
                <h1 class="font-serif text-2xl font-semibold mb-4">Spesifikasi</h1>
                <div class="grid grid-cols-1 gap-px overflow-hidden rounded-lg border bg-gray-200 md:grid-cols-4">
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Release Date:</h3>
                        <p>2018</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Camera:</h3>
                        <p>12MP camera</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Selfie:</h3>
                        <p>7MP</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Durability:</h3>
                        <p>Splash, Water, and Dust Resistant</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Screen Size:</h3>
                        <p>165.1 mm (diagonal)</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">RAM:</h3>
                        <p>3GB</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Resolution:</h3>
                        <p>1792x828</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Dual SIM:</h3>
                        <p>Yes</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">SIM Card:</h3>
                        <p>Nano-SIM & eSIM</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Sensors:</h3>
                        <p>Face ID, Barometer, Three-axis gyro, Accelerometer, Proximity sensor, Ambient light sensor, Siri natural language commands and dictation</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Network:</h3>
                        <p>GSM/CDMA/HSPA/EVDO/LTE</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Height:</h3>
                        <p>150.9 mm</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Width:</h3>
                        <p>75.7 mm</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Depth:</h3>
                        <p>8.3 mm</p>
                    </div>
                    <div class="bg-white p-2">
                        <h3 class="font-semibold ">Weight:</h3>
                        <p>194 g</p>
                    </div>
                    <div class="bg-white"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-6 pb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
            <div class="text-center border rounded-lg bg-white flex p-6 items-center">
                <figure class="basis-1/3 mr-3">
                    <img class="h-16" src="https://cdn.jagofon.com/mockdata/value-propositions/change-the-world.webp" alt="Mengubah Dunia">
                </figure>
                <div class="basis-2/3 text-left mt-0">
                    <p class="font-semibold text-teal-500">Mengubah dunia</p>
                </div>
            </div>
            <div class="text-center border rounded-lg bg-white flex p-6 items-center">
                <figure class="basis-1/3 mr-3">
                    <img class="h-16" src="https://cdn.jagofon.com/mockdata/value-propositions/money-back-guarantee.png" alt="Mengubah Dunia">
                </figure>
                <div class="basis-2/3 text-left mt-0">
                    <p class="font-semibold text-teal-500">Jaminan 7 hari uang kembali</p>
                </div>
            </div>
            <div class="text-center border rounded-lg bg-white flex p-6 items-center">
                <figure class="basis-1/3 mr-3">
                    <img class="h-16" src="https://cdn.jagofon.com/mockdata/value-propositions/1-year-warranty.png" alt="Mengubah Dunia">
                </figure>
                <div class="basis-2/3 text-left mt-0">
                    <p class="font-semibold text-teal-500">Garansi fleksibel</p>
                </div>
            </div>
            <div class="text-center border rounded-lg bg-white flex p-6 items-center">
                <figure class="basis-1/3 mr-3">
                    <img class="h-16" src="https://cdn.jagofon.com/mockdata/value-propositions/free-shipping.png" alt="Mengubah Dunia">
                </figure>
                <div class="basis-2/3 text-left mt-0">
                    <p class="font-semibold text-teal-500">Pengiriman gratis untuk semua produk</p>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="px-6 pb-6">
        <h1 class="font-semibold text-3xl font-serif">Produk Mirip</h1>
    </section> --}}

@endsection


@section('style')
    <style>
        .my-slides {
            display: none;
        }
        img {
            vertical-align: middle;
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            background: #959595;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: -30px;
            border-radius: 3px 0 0 3px;
        }

        .prev {
            left: -30px;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
        }
    </style>
@endsection


@section('script')
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("my-slides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }
    </script>

@endsection