<!-- resources/views/profile.blade.php -->
@extends('layouts.account.account')

@section('title', 'Profile')

@section('main')
    <h1 class="text-2xl font-semibold mb-3">Alamat Saya</h1>
    <div>
        <div class="flex justify-between">
            <h3 class="text-md font-semibold">Alamat Tempat Tinggal</h3>
            @if(count($user->addresses) < 1)
                <button class="text-teal-500 text-md px-2 rounded-md border border-teal-500 hover:bg-teal-100 text-semibold" id="openEditAddress">+</button>
            @endif
        </div>

        @if(count($user->addresses) > 0)
            <div class="border rounded-lg flex flex-col p-5 mt-3">
                <div class="flex justify-between">
                    <h3 class="text-md text-gray-600 font-semibold">Admin (08512738213)</h3>
                    {{-- tombol edit --}}
                    <button class="text-teal-500 text-xs p-1 rounded-md border border-teal-500 hover:bg-teal-100 text-semibold" id="openEditAddress">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>                  
                    </button>
                    {{-- Modal --}}
                    <div id="myModal" class="fixed inset-0 bg-gray-900 bg-opacity-50s flex items-center justify-center hidden">
                        <div class="bg-white rounded-lg p-6 w-1/3">
                            <h2 class="text-xl font-bold mb-4">Edit Alamat</h2>
                            <div class="flex flex-col gap-2">
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="flex flex-col gap-2">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="border rounded px-2 py-1">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label for="phone_number">No Telepon</label>
                                        <input type="text" name="phone_number" id="phone_number" class="border rounded px-2 py-1">
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="flex flex-col gap-2">
                                        <label for="address">Alamat</label>
                                        <input type="text" name="address" id="address" class="border rounded px-2 py-1">
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <label for="postal_code">Kode Pos</label>
                                        <input type="text" name="postal_code" id="postal_code" class="border rounded px-2 py-1">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="district">Kecamatan/Kelurahan</label>
                                    <input type="text" name="district" id="district" class="border rounded px-2 py-1">
                                </div>
                            </div>
                            <div class="flex justify-start">
                                <button id="closeModalBtn" class="px-4 py-2 bg-teal-500 text-white rounded">Submit</button>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div>
                    <p class="text-sm font-semibold">Asgard</p>
                    <p class="text-xs">PONDOK BAMBU, DUREN SAWIT, KOTA JAKARTA TIMUR</p>
                    <p class="text-xs">DKI JAKARTA, 81792</p>
                </div>
            </div>
        @endif
    </div>
    {{-- <div class="mt-4">
        <h3 class="text-md font-semibold">Alamat Penagihan</h3>
        <input type="checkbox" onclick="billingAddress()" name="billing_address" id="billing-address">
        <label for="billing_address">Sama dengan alamat pengiriman</label>
        <div class="border rounded-lg flex flex-col p-5 mt-3" id="billing-address-card">
            <h3 class="text-md text-gray-600 font-semibold">Admin (08512738213)</h1>
                <div >
                    <p class="text-sm font-semibold">Asgard</p>
                    <p class="text-xs">PONDOK BAMBU, DUREN SAWIT, KOTA JAKARTA TIMUR</p>
                    <p class="text-xs">DKI JAKARTA, 81792</p>
                </div>
        </div>
    </div>

    <div class="mt-4">
        <h3 class="text-md font-semibold">Alamat Pengiriman</h3>
        <div class="border rounded-lg flex flex-col p-5 mt-3">
            <h3 class="text-md text-gray-600 font-semibold">Admin (08512738213)</h1>
                <div >
                    <p class="text-sm font-semibold">Asgard</p>
                    <p class="text-xs">PONDOK BAMBU, DUREN SAWIT, KOTA JAKARTA TIMUR</p>
                    <p class="text-xs">DKI JAKARTA, 81792</p>
                </div>
        </div>
    </div> --}}

@endsection

@section('script')
    <script>
        const modal = document.getElementById('myModal');
        const openEditAddress = document.getElementById('openEditAddress');
        const closeModalBtn = document.getElementById('closeModalBtn');

        const billingAddressCard = document.getElementById('billing-address-card');
        function billingAddress() {
            billingAddressCard.classList.toggle('hidden');
        }

        openEditAddress.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Close modal
        closeModalBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Close modal when clicking outside of it
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>
@endsection