@extends('layouts.main')

@section('title', 'Jual Device')

@section('content')

    <section class="p-20">
        <h1 class="text-5xl text-center">Jual HP lama kamu!</h1>
        <div class="border p-10 mt-5 bg-white">
            {{-- Steps --}}
            <div class="flex justify-center gap-40 px-20 ">
                <div class="flex flex-col gap-2 items-center">
                    {{-- <p class="w-3 h-3 bg-teal-400 flex items-center justify-center p-5 rounded-full border-[2px] border-teal-500 text-white font-bold">1</p> --}}
                    <p class="w-3 h-3 flex items-center justify-center p-5 rounded-full border-[2px] border-teal-400 text-teal-400 font-bold">1</p>
                    {{-- <p class="w-3 h-3 bg-gray-900 flex items-center justify-center p-5 rounded-full border-[2px] border-gray-500 text-white font-bold">1</p> --}}
                    <p class="text-md font-semibold">Informasi Pribadi</p>
                </div>
                <div class="flex flex-col gap-2 items-center">
                    {{-- <p class="w-3 h-3 bg-teal-400 flex items-center justify-center p-5 rounded-full border-[2px] border-teal-500 text-white font-bold">2</p> --}}
                    <p class="w-3 h-3 bg-gray-900 flex items-center justify-center p-5 rounded-full border-[2px] border-gray-500 text-white font-bold">2</p>
                    <p class="text-md font-semibold">Device Kamu</p>
                </div>
            </div>

            {{-- Form --}}
            <form action="" method="POST">
                @csrf
                <div id="form1" class="form">
                    <div class="mt-4 flex flex-col gap-5">
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
                            <button type="button" disabled class="p-3 border cursor-not-allowed border-teal-400 text-teal-400">Sebelumnya</button>
                            <button type="button" onclick="switchForm('form2')" class="p-3 bg-teal-500 text-white hover:bg-teal-600">Selanjutnya</button>
                        </div>
                    </div>
                </div>
                <div id="form2" class="form hidden">
                    <div class="mt-4 flex flex-col gap-5">
                        <div class="flex flex-col gap-1">
                            <label class="text-md font-semibold" for="name">Pilih ponsel yang anda ingin jual</label>
                            <input type="text" name="nama" id="nama" placeholder="cth: iPhone 14" class="border border-gray-300 rounded py-3 px-3">
                        </div>
                        <span class="font-semibold text-md">Pilih garansi HP anda</span>
                        <div class="flex gap-5">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Laki-laki">
                                    <span class="ml-2">Internasional</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Perempuan">
                                    <span class="ml-2">Resmi Indonesia</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Pilih kondisi layar HP anda</span>
                        <div class="flex flex-col gap-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Laki-laki">
                                    <span class="ml-2">Perfect: Tidak ada goresan</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Perempuan">
                                    <span class="ml-2">Good: Goresan tidak terlihat ketika layar menyala</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Laki-laki">
                                    <span class="ml-2">Functional: Goresan terlihat ketika layar nyala</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Perempuan">
                                    <span class="ml-2">Broken: Layar retak</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Pilih kondisi fisik HP anda</span>
                        <div class="flex flex-col gap-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Laki-laki">
                                    <span class="ml-2">Perfect: Tidak ada goresan</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Perempuan">
                                    <span class="ml-2">Very Good: Goresan di fisik tidak terlihat dari jarak 20 cm</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Laki-laki">
                                    <span class="ml-2">Good: Goresan di fisik tidak terlihat dari jarak 50 cm</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Perempuan">
                                    <span class="ml-2">Broken: Goresan dan/atau penyok di fisik terlihat jelas</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Apakah HP anda memiliki box/dus asli?</span>
                        <div class="flex gap-5">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Laki-laki">
                                    <span class="ml-2">Ya</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio accent-teal-400" name="gender" value="Perempuan">
                                    <span class="ml-2">Tidak</span>
                                </label>
                            </div>
                        </div>
                        <span class="font-semibold text-md">Pilih masalah lain dengan handphone anda (jika ada)</span>
                        <span class="text-red-500 text-xs">*Kosongkan bila tidak ada pilihannya</span>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Membaca">
                                <span class="ml-2">True tone tidak berfungsi (Khusus iPhone)</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Menulis">
                                <span class="ml-2">Battery health di bawah 80% (khusus iPhone)</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Olahraga">
                                <span class="ml-2">Tidak bisa hidup/nyala</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Olahraga">
                                <span class="ml-2">Kamera tidak berfungsi</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Olahraga">
                                <span class="ml-2">Touch screen tidak berfungsi dengan baik</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Olahraga">
                                <span class="ml-2">Fingerprint/Face ID tidak berfungsi</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Olahraga">
                                <span class="ml-2">Tombol tidak berfungsi</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Olahraga">
                                <span class="ml-2">Wifi/Smartfren only</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox accent-teal-400" name="hobbies[]" value="Olahraga">
                                <span class="ml-2">Shadow/Dead pixel di layar</span>
                            </label>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" onclick="switchForm('form1')" class="p-3 border border-teal-500 text-teal-500 hover:bg-teal-400 hover:text-white">Sebelumnya</button>
                            <button type="submit" class="p-3 bg-teal-500 text-white hover:bg-teal-600">Lihat penawaran</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function switchForm(formId) {
            document.querySelectorAll('.form').forEach(form => {
                form.classList.add('hidden');
            });
            document.getElementById(formId).classList.remove('hidden');
        }
    </script>
@endsection