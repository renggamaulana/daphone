@extends('layouts.main')

@section('title', 'Payment')

@section('content')
    <div class="p-10 flex gap-4">
        <main class="w-4/6 border rounded-lg bg-white p-10">
            <h1 class="text-2xl font-semibold font-serif">Pilih Metode Pembayaran</h1>
            <div class="divide-y overflow-hidden rounded-lg border mt-3">
                {{-- <label for="e-wallet" class="flex gap-3">
                    <input type="radio" name="e-wallet" id="">
                    Transfer/E-Wallet
                </input> --}}
                <div>
                    <button onclick="selectPaymentMethod('Transfer/E-wallet')" class="focus:outline-none focus-visible:outline-0 disabled:cursor-not-allowed disabled:opacity-75 flex-shrink-0 font-normal rounded-none text-sm gap-x-1.5 px-2.5 py-1.5 ring-inset ring-gray-300  text-gray-900 bg-white hover:bg-gray-50 disabled:bg-white focus-visible:ring-2 focus-visible:ring-gray-500 ring-0 shadow-none w-full flex justify-center items-center">
                        <div class="flex w-full justify-between">
                            <div class="flex items-center gap-2">   
                                <span id="tf-radio" class="block size-5 rounded-full border-2 border-gray-600"></span>
                                <p>Transfer/E-Wallet</p>
                            </div>
                            <div></div>
                        </div>
                    </button>
                </div>
                <div>
                    <button onclick="selectPaymentMethod('QRIS')" class="focus:outline-none focus-visible:outline-0 disabled:cursor-not-allowed disabled:opacity-75 flex-shrink-0 font-normal rounded-none text-sm gap-x-1.5 px-2.5 py-1.5 ring-inset ring-gray-300  text-gray-900 bg-white hover:bg-gray-50 disabled:bg-white focus-visible:ring-2 focus-visible:ring-gray-500 ring-0 shadow-none w-full flex justify-center items-center">
                        <div class="flex w-full justify-between">
                            <div class="flex items-center gap-2">   
                                <span id="qris-radio" class="block size-5 rounded-full border-2 border-gray-600"></span>
                                <p>QRIS</p>
                            </div>
                            <div></div>
                        </div>
                    </button>
                    <div class="p-2.5 hidden" id="qris-list">
                        <div>
                            <h4 class="is-size-5 has-text-weight-bold">Metode Pembayaran yang Didukung</h4>
                            <ol class="list-inside list-disc">
                                <li>Dana</li>
                                <li>OVO</li>
                                <li>LinkAja</li>
                                <li>GoPay</li>
                                <li>BCA</li>
                                <li>CIMB</li>
                                <li>ShopeePay</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <aside class="w-2/6 flex flex-col gap-5">
            <div class="border rounded-lg p-6 self-start bg-white w-full">
                <div class="divide-y">
                    <div class="py-3 first:pt-0">
                        <div class="flex items-start">
                            <div class="size-12">
                                <img src="{{ asset('images/product1.jpg') }}" alt="">
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
            <div class="pt-3 flex">
                <button onclick="submitPaymentMethod()" class="w-full text-center px-3 py-1 bg-purple-500 hover:bg-purple-600 text-white rounded-lg">Lanjut ke Pembayaran</button>
            </div>
            <p class="text-sm text-gray-500">Kepuasan dijamin atau uang Anda kembali dalam 7 hari.Dengan mengonfirmasi pesanan ini, Anda menerima Syarat & Ketentuan dan Kebijakan Privasi kami</p>
        </aside>

    </div>

@endsection


@section('script')
    <script>
         let selectedPaymentMethod = '';

        function selectPaymentMethod(val) {
            // Ambil elemen-elemen yang terlibat
            const qrisList = document.getElementById('qris-list');
            const qrisRadio = document.getElementById('qris-radio');
            const tfRadio = document.getElementById('tf-radio');

            // Reset elemen-elemen ke kondisi semula
            qrisList.classList.add('hidden');
            qrisRadio.classList.remove('border-8', 'border-teal-500', 'border-gray-600');
            tfRadio.classList.remove('border-8', 'border-teal-500', 'border-gray-600');

            // Terapkan perubahan berdasarkan nilai yang dipilih
            if (val === 'QRIS') {
                qrisList.classList.remove('hidden');
                qrisRadio.classList.add('border-8', 'border-teal-500');
            } else if (val === 'Transfer/E-wallet') {
                tfRadio.classList.add('border-8', 'border-teal-500');
            }

            selectedPaymentMethod = val;
         }

         function submitPaymentMethod() {
            if (!selectedPaymentMethod) {
                alert('Please select a payment method.');
                return;
            }

            fetch('/submit-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ payment_method: selectedPaymentMethod })
            })
            .then(response => response.json())
            .then(data => {
                // Tangani respon dari server
                window.location.href = '{{ route('checkout.confirm-payment') }}';
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error submitting the payment method.');
            });
        }
    </script>

@endsection