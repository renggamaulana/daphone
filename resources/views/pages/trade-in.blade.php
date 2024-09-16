@extends('layouts.main')

@section('title', 'Trade-In') 

@section('content')
    <section class="p-5 md:p-10">
        <h1 class="text-xl md:text-5xl font-semibold font-serif text-center">Dapatkan gadget impianmu dengan mudah, tukar tambah disini!</h1>
        <div class="border p-5 md:p-10 mt-5 bg-white">

            {{-- Form --}}
            <form action="{{ route('trade-in.confirm') }}" method="get" class="mt-4 flex flex-col gap-5">
                @csrf
                <div id="form1" class="form flex flex-col gap-2">
                    <div class="flex flex-col gap-1">
                        <label class="text-gray-600 font-semibold" for="name">Nama</label>
                        <input type="text" name="nama" id="nama" class="border border-gray-300 rounded px-3 py-2">
                    </div>
                    <div class="grid  md:grid-cols-2 gap-3">
                        <div class="flex flex-col gap-1">
                            <label class="text-gray-600 font-semibold" for="email">Email</label>
                            <input type="email" name="email" id="email" class="border border-gray-300 rounded px-3 py-2">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-gray-600 font-semibold" for="phone_number">Nomor Handphone</label>
                            <input type="text" name="phone_number" id="phone_number" class="border border-gray-300 rounded px-3 py-2">
                        </div>
                    </div>
                    <div class="mt-4 flex flex-col gap-5">
                        <div class="flex flex-col gap-1">
                            <label class="text-md font-semibold" for="phone_want_to_sell">Pilih ponsel yang anda ingin jual</label>
                            <input type="text" name="phone_want_to_sell" id="phone_want_to_sell" placeholder="cth: iPhone 14" class="border border-gray-300 rounded py-3 px-3">
                        </div>
                        <span class="font-semibold text-md">Pilih garansi HP anda</span>
                        <div class="flex gap-5">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="guarantee" value="Internasional">
                                    <span class="ml-2">Internasional</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="guarantee" value="Resmi Indonesia">
                                    <span class="ml-2">Resmi Indonesia</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Pilih kondisi layar HP anda</span>
                        <div class="flex flex-col gap-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="screen_condition" value="Perfect">
                                    <span class="ml-2">Perfect: Tidak ada goresan</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="screen_condition" value="Good">
                                    <span class="ml-2">Good: Goresan tidak terlihat ketika layar menyala</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="screen_condition" value="Functional">
                                    <span class="ml-2">Functional: Goresan terlihat ketika layar nyala</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="screen_condition" value="Broken">
                                    <span class="ml-2">Broken: Layar retak</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Pilih kondisi fisik HP anda</span>
                        <div class="flex flex-col gap-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="physical_condition" value="Perfect">
                                    <span class="ml-2">Perfect: Tidak ada goresan</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="physical_condition" value="Very Good">
                                    <span class="ml-2">Very Good: Goresan di fisik tidak terlihat dari jarak 20 cm</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="physical_condition" value="Good">
                                    <span class="ml-2">Good: Goresan di fisik tidak terlihat dari jarak 50 cm</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="physical_condition" value="Broken">
                                    <span class="ml-2">Broken: Goresan dan/atau penyok di fisik terlihat jelas</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Apakah HP anda memiliki box/dus asli?</span>
                        <div class="flex gap-5">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="have_box" value="Ya">
                                    <span class="ml-2">Ya</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="have_box" value="Tidak">
                                    <span class="ml-2">Tidak</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Pilih masalah lain dengan handphone anda (jika ada)</span>
                        <span class="text-red-500 text-xs">*Kosongkan bila tidak ada pilihannya</span>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="True Tone">
                                <span class="ml-2">True tone tidak berfungsi (Khusus iPhone)</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Battery Health">
                                <span class="ml-2">Battery health di bawah 80% (khusus iPhone)</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Tidak bisa nyala">
                                <span class="ml-2">Tidak bisa hidup/nyala</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Kamera tidak berfungsi">
                                <span class="ml-2">Kamera tidak berfungsi</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Touch screen tidak berfungsi">
                                <span class="ml-2">Touch screen tidak berfungsi dengan baik</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Fingerprint/Face ID tidak berfungsi">
                                <span class="ml-2">Fingerprint/Face ID tidak berfungsi</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Tombol tidak berfungsi">
                                <span class="ml-2">Tombol tidak berfungsi</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Wifi/Smartfren Only">
                                <span class="ml-2">Wifi/Smartfren only</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="minus[]" value="Shadow/Dead pixel">
                                <span class="ml-2">Shadow/Dead pixel di layar</span>
                            </label>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-gray-600 font-semibold" for="desire_phone">Masukkan HP yang anda inginkan</label>
                            <input type="text" name="desire_phone" id="desire_phone" class="border border-gray-300 rounded px-3 py-2">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit" class="px-2 py-1 rounded bg-teal-400  text-white hover:bg-teal-600">Submit</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </section>
@endsection