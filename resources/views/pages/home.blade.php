@extends('layouts.main')

@section('title', 'Home')

@section('content')
<section class="p-20">

    <div class="h-[200px]">
        <img class="h-[300px] w-full object-cover" src="{{ asset('images/phone-banner.jpg') }}" alt="">
    </div>
</section>

<section class="p-20">
    <h1 class="text-3xl font-bold mb-5">Flash Sale!</h1>
    
    <div class="grid grid-cols-4 gap-4">
        @for($i = 0; $i < 4; $i++)
            <div class="border">
                <img src="{{ asset('images/product1.jpg') }}" alt=""> 
                <div class="description p-5">
                    <h1 class="font-bold text-xl">Samsung Galaxy S4</h1>
                    <p>Startting from IDR Rp.4000.000</p>
                </div>
            </div>
        @endfor
    </div>
</section>

<section class="p-20">
    <h1 class="text-3xl font-bold mb-5">Our Best Seller</h1>

    <div class="grid grid-cols-3 gap-4 ">
        @foreach($products as $product)
            <div class="border p-5">
               <h1>{{ $product->name }} </h1>
            </div>
        @endforeach
    </div>

</section>

<section class="p-20">
    <div class="border p-10 flex gap-10 justify-between">
        <div class="flex-2 w-[400px]">
            <h1 class="text-3xl">Sedikit tentang Daphone</h1>
            <p class="mt-3" class="leading-8 mt-4">Selamat Datang Di Daphone! Kami merupakan marketplace pertama di Indonesia yang berspesialisasi dalam smartphone bekas.</p>
            <p class="mt-3" >Misi kami adalah membangun kembali kepercayaan pada pasar smartphone bekas melalui ponsel berkualitas tinggi tetapi dengan harga yang terjangkau. Kami menjalankan metodologi seleksi dan pengujian yang sangat cermat untuk memberikan produk yang terbaik bagimu.</p>
            <p class="mt-3" >Dengan membeli dari kami, kamu memberi nyawa kedua bagi sebuah perangkat, sehingga kamu turut membantu mengurangi limbah elektronik dan melindungi lingkungan.</p>    
            </div>
        <div class="flex-1 grid grid-cols-2">
            <div class="flex flex-col gap-1 text-center items-center w-[200px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                </svg>
                <h1 class="text-teal-400 font-semibold">Jaminan Kualitas</h1>
                <p>Ponsel berfungsi 100%.
                    Garansi 30 hari gratis.
                </p>
            </div>
            <div class="flex flex-col gap-1 text-center items-center w-[200px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg> 
                <h1 class="text-teal-400 font-semibold">Harga Terjangkau</h1>
                <p>Pilihan produk kami berkualitas
                    tinggi dengan harga yang terjangkau.
                </p>
            </div>
            <div class="flex flex-col gap-1 text-center items-center w-[200px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>                  
                <h1 class="text-teal-400 font-semibold">Transparansi & Legalitas</h1>
                <p>Semua ponsel original dan
                    tunduk pada peraturan terbaru.
                </p>
            </div>
            <div class="flex flex-col gap-1 text-center items-center w-[200px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                </svg>                  
                <h1 class="text-teal-400 font-semibold">Layanan Pelanggan</h1>
                <p>Kami selalu memberikan pengalaman
                    belanja terbaik untukmu.
                </p>
            </div>
        </div>

    </div>
</section>


<section class="flex my-5">
    <div class="w-full h-[200px] bg-gradient-to-r from-[#1488CC] to-[#2B32B2]">
        <h1 class="whitespace-pre text-white text-2xl">Terpercaya di <br>Indonesia</h1>
        <p class="text-white text-md">Mendukung usaha lokal.
            Kualitas Premium Jago</p>
        <a href="">beli sekarang</a>
    </div>
    <div class="w-full h-[200px] bg-gradient-to-r from-[#2193b0] to-[#6dd5ed]">

    </div>
</section>

@endsection