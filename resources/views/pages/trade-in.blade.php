@extends('layouts.main')

@section('title', 'Trade-In') 

@section('content')
    <section class="p-20">
        <h1 class="text-5xl text-center">Dapatkan gadget impianmu dengan mudah, tukar tambah disini!</h1>
        <div class="border p-10 mt-5 bg-white">
            {{-- Steps --}}
            <div class="flex justify-between px-20">
                <div class="flex flex-col gap-2 items-center">
                    <p class="w-3 h-3 bg-teal-400 flex items-center justify-center p-5 rounded-full border-[2px] border-teal-500 text-white font-bold">1</p>
                    {{-- <p class="w-3 h-3 bg-gray-900 flex items-center justify-center p-5 rounded-full border-[2px] border-gray-500 text-white font-bold">1</p> --}}
                    <p class="text-md font-semibold">Informasi Pribadi</p>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    {{-- <p class="w-3 h-3 bg-teal-400 flex items-center justify-center p-5 rounded-full border-[2px] border-teal-500 text-white font-bold">2</p> --}}
                    <p class="w-3 h-3 bg-gray-900 flex items-center justify-center p-5 rounded-full border-[2px] border-gray-500 text-white font-bold">2</p>
                    <p class="text-md font-semibold">Device Kamu</p>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    {{-- <p class="w-3 h-3 bg-teal-400 flex items-center justify-center p-5 rounded-full border-[2px] border-teal-500 text-white font-bold">3</p> --}}
                    <p class="w-3 h-3 bg-gray-900 flex items-center justify-center p-5 rounded-full border-[2px] border-gray-500 text-white font-bold">3</p>
                    <p class="text-md font-semibold">Device yang diinginkan</p>
                </div>
            </div>

            {{-- Form --}}
            <form action="" method="POST" class="mt-4 flex flex-col gap-5">
                @csrf
                <div id="form1" class="form">
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="name">Nama</label>
                        <input type="text" name="nama" id="nama" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="name">Nomor Handphone</label>
                        <input type="text" name="phone_number" id="phone_number" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="email">Email</label>
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex gap-2">
                        <button class="p-3 border border-teal-500 text-teal-500 hover:bg-teal-400 hover:text-white">Sebelumnya</button>
                        <button class="p-3 bg-teal-500 text-white hover:bg-teal-600">Selanjutnya</button>
                    </div>
                </div>
                <div id="form2" class="form">
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="name">Nama</label>
                        <input type="text" name="nama" id="nama" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="name">Nomor Handphone</label>
                        <input type="text" name="phone_number" id="phone_number" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="email">Email</label>
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex gap-2">
                        <button class="p-3 border border-teal-500 text-teal-500 hover:bg-teal-400 hover:text-white">Sebelumnya</button>
                        <button class="p-3 bg-teal-500 text-white hover:bg-teal-600">Selanjutnya</button>
                    </div>
                </div>
                <div id="form3" class="form">
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="name">Nama</label>
                        <input type="text" name="nama" id="nama" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="name">Nomor Handphone</label>
                        <input type="text" name="phone_number" id="phone_number" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="email">Email</label>
                        <input type="email" name="email" id="email" class="border border-gray-300 rounded py-3 px-3">
                    </div>
                    <div class="flex gap-2">
                        <button class="p-3 border border-teal-500 text-teal-500 hover:bg-teal-400 hover:text-white">Sebelumnya</button>
                        <button class="p-3 bg-teal-500 text-white hover:bg-teal-600">Selanjutnya</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection