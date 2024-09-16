<!-- resources/views/profile.blade.php -->
@extends('layouts.account.account')

@section('title', 'Profile')

@section('main')
    @if(session('success'))
        <div id="success-notification"  class="block p-3 bg-green-400 text-white font-semibold rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div id="error-notification" class="block p-3 bg-red-400 text-white font-semibold rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-2xl font-semibold mb-3">Alamat Saya</h1>
    <div>
        <div class="flex justify-between">
            <h3 class="text-md font-semibold">Alamat Tempat Tinggal</h3>
            @if(count($user->addresses) < 1)
                <button id="openCreateAddress" class="text-teal-500 text-md px-2 rounded-md border border-teal-500 hover:bg-teal-100 text-semibold" id="addAddress">+</button>
            @endif
        </div>

        <div class="flex justify-between">
            {{-- Modal --}}
            <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50  flex items-center justify-center hidden">
                <div class="bg-white rounded-lg p-6 w-2/3">
                    <h2 class="text-xl font-bold mb-4">Tambah Alamat</h2>
                    <form action="{{ route('account.add-address') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="residence">
                        <div class="flex flex-col gap-2">
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex flex-col gap-2">
                                    <label for="recipient_name">Nama</label>
                                    <input type="text" name="recipient_name" id="recipient_name" class="border rounded px-2 py-1">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="phone_number">No Telepon</label>
                                    <input type="text" name="phone_number" id="phone_number" class="border rounded px-2 py-1">
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex flex-col gap-2">
                                    <label for="state">Provinsi</label>
                                    <input type="text" name="state" id="state" class="border rounded px-2 py-1">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="city">Kota</label>
                                    <input type="text" name="city" id="city" class="border rounded px-2 py-1">
                                </div>
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="district">Kecamatan/Kelurahan</label>
                                <input type="text" name="district" id="district" class="border rounded px-2 py-1">
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex flex-col gap-2">
                                    <label for="address_line1">Alamat</label>
                                    <input type="text" name="address_line1" id="address_line1" class="border rounded px-2 py-1">
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label for="postal_code">Kode Pos</label>
                                    <input type="text" name="postal_code" id="postal_code" class="border rounded px-2 py-1">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-start mt-4">
                            <button id="closeModalBtn" type="submit" class="px-4 py-2 bg-teal-500 text-white rounded">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(count($user->addresses) > 0)
            @foreach($user->addresses as $address)
                <div class="border rounded-lg flex flex-col p-5 mt-3">
                    <div class="flex justify-between">
                        <h3 class="text-md text-gray-600 font-semibold">{{ $address->recipient_name }} ({{ $address->phone_number }})</h3>

                        <div class="flex gap-2">
                            <form onclick="confirm('Anda yakin ingin menghapus alamat ini?')" action="{{ route('account.delete-address', $address->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="text-red-500 text-xs p-1 rounded-md border border-red-500 hover:bg-red-100 text-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 md:size-5">
                                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                            <button class="text-teal-500 text-xs p-1 rounded-md border border-teal-500 hover:bg-teal-100 text-semibold self-baseline">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 md:size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-semibold">{{ $address->address_line1 }}</p>
                        <p class="text-xs">{{ $address->district }}, {{ $address->city }},</p>
                        <p class="text-xs">{{ $address->state }}, {{ $address->postal_code }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="mt-4">
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
    </div>

@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const successNotification = document.getElementById('success-notification');
            const errorNotification = document.getElementById('error-notification');

            if (successNotification) {
                setTimeout(() => {
                    successNotification.style.display = 'none';
                }, 2000); // 5000 ms = 5 detik
            }

            if (errorNotification) {
                setTimeout(() => {
                    errorNotification.style.display = 'none';
                }, 2000); // 5000 ms = 5 detik
            }
        });

        const createModal = document.getElementById('createModal');
        const openCreateAddress = document.getElementById('openCreateAddress');
        const closeModalBtn = document.getElementById('closeModalBtn');

        const billingAddressCard = document.getElementById('billing-address-card');
        function billingAddress() {
            billingAddressCard.classList.toggle('hidden');
        }

        openCreateAddress.addEventListener('click', () => {
            createModal.classList.remove('hidden');
        });

        // Close modal
        closeModalBtn.addEventListener('click', () => {
            createModal.classList.add('hidden');
        });

        // Close modal when clicking outside of it
        window.addEventListener('click', (event) => {
            if (event.target === createModal) {
                createModal.classList.add('hidden');
            }
        });
    </script>
@endsection
