@extends('layouts.main')

@section('title', 'Keranjang')
@section('content')
    <section class="px-20 my-5">
        <a href="{{ route('home') }}" class="border border-red-600 px-4 py-2 bg-red-500 hover:bg-red-600 text-white">Kembali</a>
        <hr class="my-5">

        <div class="flex gap-5">
            <div class="w-4/6">
                <h1 class="text-3xl font-semibold">Keranjang Saya</h1>
                <div class="border border-grey-800 px-8 py-5 my-5 bg-white">
                    <div class="flex flex-col gap-5">
                        <div class="flex gap-4">
                            <div class="w-40">
                                <img class="w-[146px] h-[146px] object-cover" src="{{ asset('images/product1.jpg') }}" alt="">
                            </div>
                            <div class="flex flex-col justify-between">
                                <div>
                                    <h3 class="text-semibold text-2xl">Samsung Galaxy S4</h3>
                                    <p class="text-sm text-grey-400">Kondisi: Good</span>
                                    <p class="text-sm text-grey-400">Penjual: FonCell</span>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold">Rp 3.850.000</h4>
                                    <button class="text-xs text-blue-500">Hapus</button>
                                </div>
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
                <p class="text-sm text-gray-500">Kepuasan dijamin atau uang Anda kembali dalam 7 hari.</p>
                <p class="text-sm text-gray-500">Dengan mengonfirmasi pesanan ini, Anda menerima Syarat & Ketentuan dan Kebijakan Privasi kami</p>
            </div>

            <div class="w-2/6">
                <h1 class="font-semibold text-3xl">Ringkasan</h1>
                <div class="border border-grey-800 p-5 my-5 bg-white">
                    <div class="flex justify-between">
                        <span class="text-lg">Total:</span>
                        <span class="text-lg font-semibold" id="totalPrice"> Rp. 3.850.000</span>
                    </div>
                    <button class="px-2 py-1 bg-purple-500 hover:bg-purple-600 text-white w-full rounded mt-2">Checkout</button>
                    {{-- <p class="text-xs text-gray-500">Samsung Galaxy S4: Jaminan 30 Hari</p> --}}
                </div> 
                <p class="text-sm text-gray-500 mb-3">Kepuasan dijamin atau uang Anda kembali dalam 7 hari.</p>
                <p class="text-sm text-gray-500">Dengan mengonfirmasi pesanan ini, Anda menerima <a href="" class="underline">Syarat & Ketentuan</a> dan <a href="" class="underline">Kebijakan Privasi</a> kami</p>
            </div>

        </div>

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
                let basePrice = 3850000; // Harga dasar produk
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