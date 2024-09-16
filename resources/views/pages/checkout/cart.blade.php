@extends('layouts.main')

@section('title', 'Keranjang')
@section('content')
    <section class="px-20 my-5">
        <a href="{{ route('home') }}" class="border border-red-600 px-4 py-2 bg-red-500 hover:bg-red-600 text-white">Kembali</a>
        <hr class="my-5">

        @if(count($cartItems) > 0)
            <div class="flex flex-wrap md:flex-nowrap gap-5">
                <div class="md:w-4/6">
                    <h1 class="text-3xl font-semibold">Keranjang Saya</h1>
                    @foreach($cartItems as $cartItem)
                        <div class="border border-grey-800 px-8 py-5 my-5 bg-white">
                            <div class="flex flex-col gap-5">
                                <div class="flex gap-4">
                                    <div class="w-40">
                                        <img class="w-[146px] h-[146px] object-contain" src="{{ Storage::url($cartItem->product->image) }}" alt="{{ $cartItem->product->name }}">
                                    </div>
                                    <div class="flex flex-col justify-between">
                                        <div>
                                            <h3 class="text-semibold text-2xl">{{ $cartItem->product->name }} </h3>
                                            <p class="text-sm text-grey-400">Kondisi: {{ $cartItem->product->condition }}</span>
                                            <p class="text-sm text-grey-400">Penjual: FonCell</span>
                                        </div>
                                        <div>
                                            <h4 class="text-xl font-semibold">Rp {{ number_format($cartItem->product->price, 2, ',' ,'.') }}</h4>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        <form action="{{ route('checkout.delete-cart', $cartItem->id) }}" method="POST" class="ml-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="hidden" name="warranty" value="30days">
                                        <div class="toggle bg-gray-200 w-14 h-8 rounded-full p-1">
                                            <div class="toggle-dot bg-white w-6 h-6 rounded-full shadow-md"></div>
                                        </div>
                                        <span class="ml-3 text-gray-700 font-semibold">Jaminan 30 hari Rp 0</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" class="hidden" name="warranty" value="6months">
                                        <div class="toggle bg-gray-200 w-14 h-8 rounded-full p-1">
                                            <div class="toggle-dot bg-white w-6 h-6 rounded-full shadow-md"></div>
                                        </div>
                                        <span class="ml-3 text-gray-700 font-semibold">Jaminan 6 bulan Rp 89.950</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <p class="text-sm text-gray-500">Kepuasan dijamin atau uang Anda kembali dalam 7 hari.</p>
                    <p class="text-sm text-gray-500">Dengan mengonfirmasi pesanan ini, Anda menerima Syarat & Ketentuan dan Kebijakan Privasi kami</p>
                </div>

                <div class="md:w-2/6">
                    <h1 class="font-semibold text-3xl">Ringkasan</h1>
                    <div class="border border-grey-800 p-5 my-5 bg-white">
                        <div class="flex justify-between">
                            <span class="text-lg">Total:</span>
                            <span class="text-lg font-semibold" id="totalPrice">Rp {{ number_format($totalAmount, 0, ',', '.')}}</span>
                        </div>
                        <form action="{{ route('checkout.shipping') }}" method="POST">
                            @csrf
                            @foreach($cartItems as $cartItem)
                                <input type="hidden" value="{{ $cartItem->product->id }}" name="product_ids[]">
                            @endforeach
                            <button type="submit" class="px-2 py-1 bg-purple-500 hover:bg-purple-600 text-white w-full rounded mt-2 block text-center">Checkout</button>
                        </form>
                    </div>
                    <p class="text-sm text-gray-500 mb-3">Kepuasan dijamin atau uang Anda kembali dalam 7 hari.</p>
                    <p class="text-sm text-gray-500">Dengan mengonfirmasi pesanan ini, Anda menerima <a href="" class="underline">Syarat & Ketentuan</a> dan <a href="" class="underline">Kebijakan Privasi</a> kami</p>
                </div>

            </div>
        @else
            <p class="text-3xl font-semibold font-serif">Keranjang anda kosong.</p>
        @endif
    </section>
@endsection


@section('style')
    <style>
        .toggle-dot {
        transition: transform 0.3s ease;
        }
        input[type="radio"]:checked + .toggle .toggle-dot {
            transform: translateX(23px); /* Sesuaikan dengan lebar toggle-dot */
        }
    </style>
@endsection

@section('script')
    <script>
        // JavaScript untuk menanggapi perubahan status radio button
        const radioButtons = document.querySelectorAll('input[name="warranty"]');
        const totalPriceElement = document.getElementById('totalPrice');

        radioButtons.forEach(button => {
            let totalAmount = @json($totalAmount);

            button.addEventListener('change', function() {
                // Reset semua toggle ke warna awal
                document.querySelectorAll('.toggle').forEach(toggle => {
                    toggle.classList.remove('bg-teal-400');
                    toggle.classList.add('bg-gray-200');
                });
                // Jika dipilih, ubah tampilan toggle yang terpilih
                if (this.checked) {
                    this.nextElementSibling.classList.remove('bg-gray-200');
                    this.nextElementSibling.classList.add('bg-teal-400');
                }
                const selectedValue = this.value;
                let newPrice = 0;
                let basePrice = totalAmount; // Harga dasar produk
                let additionalFee = 0;

                if (selectedValue === '30days') {
                    additionalFee = 0; // Tidak ada biaya tambahan untuk jaminan 30 hari
                } else if (selectedValue === '6months') {
                    additionalFee = 89950; // Biaya tambahan 50 ribu untuk jaminan 6 bulan
                }

                // Hitung total harga (harga dasar + biaya tambahan)
                let totalPrice = basePrice + additionalFee;

                // Tampilkan harga baru
                totalPriceElement.textContent = 'Rp. ' + totalPrice.toLocaleString('id-ID');
            });
        });
    </script>

@endsection
