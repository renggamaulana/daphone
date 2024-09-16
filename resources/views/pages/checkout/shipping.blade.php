@extends('layouts.main')

@section('title', 'Shipping')

@section('content')
    <div class="p-10 flex flex-wrap md:flex-nowrap gap-4">
        <main class="md:w-4/6 flex flex-col gap-4">
            <div class="w-full border rounded-lg bg-white self-baseline p-10">
                <h1 class="text-2xl font-semibold mb-5">Alamat Pengiriman</h1>
                <form action="{{ route('checkout.payment') }}" method="POST" id="shippingForm">
                    @csrf
                    @foreach($products as $product)
                        <input type="hidden" value="{{ $product->id }}" name="productIds[]">
                        <input type="hidden" name="from_page" value="shipping">
                    @endforeach
                    <div class="flex flex-col gap-2">
                        <div class="grid md:grid-cols-2 gap-3">
                            <div class="flex flex-col gap-2">
                                <label for="name">Nama</label>
                                <input type="text" value="{{ $user->name }}" name="name" id="name" class="border rounded px-2 py-1">
                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="phone_number">No Telepon</label>
                                <input type="text" value="{{ $user->phone_number }}" name="phone_number" id="phone_number" class="border rounded px-2 py-1">
                                @error('phone_number')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @foreach($user->addresses as $address)
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="flex flex-col gap-2">
                                    <label for="address_line1">Alamat</label>
                                    <input type="text" value="{{ $address->address_line1 }}" name="address_line1" id="address" class="border rounded px-2 py-1">
                                    @error('address_line1')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="postal_code">Kode Pos</label>
                                    <input type="text" value="{{ $address->postal_code }}" name="postal_code" id="postal_code" class="border rounded px-2 py-1">
                                    @error('postal_code')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="district">Kecamatan/Kelurahan</label>
                                <input type="text" value="{{ $address->district }}" name="district" id="district" class="border rounded px-2 py-1">
                                @error('district')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                        <input type="hidden" id="selectedShippingMethod" name="shipping_method" value="">
                    </div>

                </form>
            </div>
            <div class="w-full border rounded-lg bg-white self-baseline p-8">
                <h1 class="text-2xl font-semibold mb-5">Metode Pengiriman</h1>
                <div class="flex flex-col gap-3">
                        @foreach($shippingMethods as $shippingMethod)
                            <button value="{{ $shippingMethod['name'] }}" onclick="selectShippingMethod(event)" class="w-full border rounded-lg p-5 hover:border-teal-500 hover:cursor-pointer hover:bg-teal-50 focus:bg-teal-50 focus:border-teal-500">
                                <div class="flex justify-between">
                                    <h4 class="font-semibold">{{ $shippingMethod['name'] }}</h4>
                                    <h4>Rp {{ $shippingMethod['price'] }}</h4>
                                </div>
                                <p class="text-left">{{ $shippingMethod['description'] }}</p>
                                <p class="text-left">{{ $shippingMethod['delivery_area'] }}</p>
                                <p class="text-left">{{ $shippingMethod['handling_time'] }}</p>
                            </button>
                        @endforeach
                    </div>
                </div>
        </main>

        <aside class="w-full md:w-2/6 flex flex-col gap-5">
            <div class="border rounded-lg p-6 self-start bg-white w-full">
                <div class="divide-y">
                    @foreach($products as $product)
                        <div class="py-3 first:pt-0">

                            <div class="flex items-start">
                                <div class="size-28">
                                    <img class="max-w-24 max-h-24 object-cover" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="pl-1 text-sm">
                                    <p class="font-medium">{{ $product->name }} - {{ $product->storage }} - {{ $product->color }}</p>
                                    <p>Kondisi: {{ $product->condition }}</p>
                                </div>
                            </div>

                            <div class="mt-2 text-xs">
                                <div class="flex justify-between">
                                    <p>Harga Produk</p>
                                    <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                </div>
                                {{-- <div class="flex justify-between">
                                    <p>Jaminan 6 Bulan</p>
                                    <p>Rp 272.500</p>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                    <div class="flex justify-between border-t py-3 text-xs">
                        <p>JNE</p>
                        <p>Rp 0</p>
                    </div>
                </div>
                <div class="flex justify-between border-t py-3">
                    <h1 class="font-semibold">Total</h1>
                    <p class="font-semibold">Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="py-3">
                <button onclick="submitForm()" class="w-full text-center px-3 py-1 bg-purple-500 hover:bg-purple-600 text-white rounded-lg">Pilih Metode Pembayaran</button>
            </div>
        </aside>
    </div>
@endsection


@section('script')
    <script>
        // const myForm = ducument.getElementById('shippingForm');

        function submitForm(e) {
            console.log(shippingForm);
            shippingForm.submit();
        }

        function selectShippingMethod(event) {
            const selectedValue = event.currentTarget.value;
            document.getElementById('selectedShippingMethod').value = selectedValue;
        }
    </script>
@endsection
