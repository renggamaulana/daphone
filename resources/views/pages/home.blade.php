@extends('layouts.main')

@section('title', 'Home')

@section('content')
<section class="p-10">
    {{-- <div>
        <img class="h-[300px] w-full object-cover" src="{{ asset('images/phone-banner.jpg') }}" alt="">
    </div> --}}

    <div class="slideshow-container">

        <div class="my-slides fade">
          <img src="{{ asset('images/banners/banner-1.jpg') }}" class="h-[200px] md:h-[300px] w-full object-cover">
          <div class="text-gray-200 text-sm tracking-wide px-3 py-2 absolute bottom-2 w-full text-center">Dapatkan Handphone Bekas Berkualitas dengan Harga Terjangkau! 📱✨ Temukan Pilihan Terbaik untuk Anda Hari Ini!</div>
        </div>
        
        <div class="my-slides fade">
          <img src="{{ asset('images/banners/banner-2.jpg') }}" class="h-[200px] md:h-[300px] w-full object-cover">
          <div class="text-gray-200 text-sm tracking-wide px-3 py-2 absolute bottom-2 w-full text-center">Upgrade Gadget Anda Tanpa Menguras Kantong! 💰📲 Handphone Bekas Berkualitas, Harga Terbaik, Cek Sekarang!</div>
        </div>
        
        <div class="my-slides fade">
          <img src="{{ asset('images/banners/banner-3.jpg') }}" class="h-[200px] md:h-[300px] w-full object-cover">
          <div class="text-gray-200 text-sm tracking-wide px-3 py-2 absolute bottom-2 w-full text-center">Jual atau Beli Handphone Bekas Mudah dan Aman! 🔄📞 Temukan Penawaran Terbaik dan Nikmati Gadget Impian Anda!</div>
        </div>
        
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
</section>


<section class="px-6 py-8">
    <h1 class="text-4xl font-bold mb-5 font-serif">Our Best Seller</h1>

    <div class="grid grid-cols-3 gap-4">
        @foreach($products as $product)
        <a href="{{ route('products.show', ['slug' => $product->slug]) }}">
            <div class="border bg-white rounded-lg">
                <div class="w-full flex justify-center">
                    <img class="object-cover w-64 h-64 object-center" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"> 
                </div>
                <div class="p-5">
                    <h1 class="text-xl font-semibold">{{ $product->name }} </h1>
                    <p>Kondisi: {{ $product->condition }}</p>
                    <p class="text-blue-700 font-semibold text-md">Rp {{ number_format($product->price), 2, ',' }}</p>
                    <div class="flex gap-2 mt-2">
                        <span class="bg-gray-100 px-2 py-1 rounded">{{ $product->guarantee }}</span>
                        <span class="bg-gray-100 px-2 py-1 rounded">{{ $product->signal_status }}</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

</section>

<section class="px-6 pb-8">
    <div class="border p-10 flex bg-white rounded gap-10 justify-between">
        <div class="w-2/5">
            <h1 class="text-4xl font-serif font-semibold">Sedikit tentang Daphone</h1>
            <p class="mt-3" class="leading-8 mt-4">Selamat Datang Di Daphone! Kami merupakan marketplace pertama di Indonesia yang berspesialisasi dalam smartphone bekas.</p>
            <p class="mt-3" >Misi kami adalah membangun kembali kepercayaan pada pasar smartphone bekas melalui ponsel berkualitas tinggi tetapi dengan harga yang terjangkau. Kami menjalankan metodologi seleksi dan pengujian yang sangat cermat untuk memberikan produk yang terbaik bagimu.</p>
            <p class="mt-3" >Dengan membeli dari kami, kamu memberi nyawa kedua bagi sebuah perangkat, sehingga kamu turut membantu mengurangi limbah elektronik dan melindungi lingkungan.</p>    
        </div>
        <div class="w-3/5 grid grid-cols-2 gap-4">
            <div class="flex flex-col gap-1 text-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                </svg>
                <h1 class="text-teal-400 font-semibold">Jaminan Kualitas</h1>
                <p>Ponsel berfungsi 100%.
                    Garansi 30 hari gratis.
                </p>
            </div>
            <div class="flex flex-col gap-1 text-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg> 
                <h1 class="text-teal-400 font-semibold">Harga Terjangkau</h1>
                <p>Pilihan produk kami berkualitas
                    tinggi dengan harga yang terjangkau.
                </p>
            </div>
            <div class="flex flex-col gap-1 text-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>                  
                <h1 class="text-teal-400 font-semibold">Transparansi & Legalitas</h1>
                <p>Semua ponsel original dan
                    tunduk pada peraturan terbaru.
                </p>
            </div>
            <div class="flex flex-col gap-1 text-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
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
    <div class="w-full bg-gradient-to-r from-[#1488CC] to-[#2B32B2] p-10 flex flex-col justify-between">
        <h1 class="whitespace-pre text-white text-4xl mb-5">Terpercaya di <br>Indonesia</h1>
        <p class="text-white text-md w-[200px]">Mendukung usaha lokal.
            Kualitas Premium Jago</p>
        <a href="" class="text-white underline hover:text-blue-700">beli sekarang</a>
    </div>
    <div class="w-full bg-gradient-to-r from-[#2193b0] to-[#6dd5ed] p-10 flex flex-col justify-between">
        <h1 class="whitespace-pre text-white text-4xl mb-5">IMEI Diuji &<br>Berfungsi</h1>
        <a href="{{ route('about') }}" class="text-white underline hover:text-blue-700">Cari tahu alasannya</a>
    </div>
</section>

{{-- Testimoni --}}
<section class="px-6 pb-8">
    <h1 class="text-3xl font-semibold text-center mb-5">Kata Mereka</h1>
    <div class="">
        <div class="flex gap-5">
            <div class="w-full bg-white rounded border p-10 flex flex-col gap-2">
                <div class="flex flex-col gap-1 justify-center items-center">
                    <h2 class="text-3xl font-semibold">Hanif Dinar Mufida</h1>
                    <div class="flex items-center justify-center">
                        @for($i = 0; $i < 5; $i ++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-yellow-400">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                            </svg>      
                        @endfor            
                    </div>
                </div>
                <div>
                    <p class="leading-8 text-md text-gray-500">high quality product and service! if you're looking for secondhand smartphones, daphone is a right place for you. would definitely recommend to my friends and family 👍🏼👍🏼👍🏼</p>
                </div>
            </div>
    
            <div class="w-full bg-white rounded border p-10 flex flex-col gap-2">
                <div class="flex flex-col gap-1 justify-center items-center">
                    <h2 class="text-3xl font-semibold">Billy Marvin</h2>
                    <div class="flex items-center justify-center">
                        @for($i = 0; $i < 5; $i ++)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 text-yellow-400">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                            </svg>      
                        @endfor            
                    </div>
                </div>
                <div>
                    <p class="leading-8 text-md text-gray-500">Barang sesuai harapan, Cs ramah dan mau menjelaskan, Beli pagi sore sampai, Mungkin akan beli kembali buat yg ke2,ke3 Recomen bgt beli disini....</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- FaQ --}}
<section class="px-6 pb-8">
    <h1 class="text-4xl">Pertanyaan Sering Diajukan</h1>
    <ul class="accordion">
        <li>
            <input type="radio" name="accordion" id="first">
            <label for="first">Products</label>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, ad amet in provident adipisci quia quibusdam officia recusandae ipsam, molestias corporis dolorem. Itaque optio, aliquam harum illo necessitatibus facilis sunt in ducimus nobis animi numquam veniam at assumenda id. Quisquam?</p>
            </div>
        </li>
        <li>
            <input type="radio" name="accordion" id="second">
            <label for="second">Information</label>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, ad amet in provident adipisci quia quibusdam officia recusandae ipsam, molestias corporis dolorem. Itaque optio, aliquam harum illo necessitatibus facilis sunt in ducimus nobis animi numquam veniam at assumenda id. Quisquam?</p>
            </div>
        </li>
        <li>
            <input type="radio" name="accordion" id="third">
            <label for="third">Information</label>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, ad amet in provident adipisci quia quibusdam officia recusandae ipsam, molestias corporis dolorem. Itaque optio, aliquam harum illo necessitatibus facilis sunt in ducimus nobis animi numquam veniam at assumenda id. Quisquam?</p>
            </div>
        </li>
        <li>
            <input type="radio" name="accordion" id="fourth">
            <label for="fourth">Information</label>
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Qui, ad amet in provident adipisci quia quibusdam officia recusandae ipsam, molestias corporis dolorem. Itaque optio, aliquam harum illo necessitatibus facilis sunt in ducimus nobis animi numquam veniam at assumenda id. Quisquam?</p>
            </div>
        </li>
    </ul>
</section>

@endsection

@section('style')
    <style>
        body {
            background: rgba(212, 212, 212, 0.133)
        }

        .my-slides {
            display: none
        }
        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next,.text {font-size: 11px}
        }

        .accordion {
            width: 100%;
        }

        .accordion li {
            list-style: none;
            width: 100%;
            margin: 20px;
            padding: 10px;
            border-radius: 8px;
            background: white;
            box-shadow: 6px 6px 10px -1px rgba(0, 0, 0, 0.15),
            -6px -6px 10px -1px rgba(255, 255, 255, 0.75);
        }

        .accordion li label {
            display: flex;
            align-items: center;
            padding: 10px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
        }

        label::before {
            content: '+';
            margin-right: 10px;
            font-size: 24px;
            font-weight: 600
        }

        input[type="radio"] {
            display: none;
        }

        .accordion .content {
            color: #555;
            padding: 0 10px;
            line-height: 26px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s, padding 0.5s;
        }

        .accordion input[type="radio"]:checked + label + .content {
            max-height: 400px;
            padding: 10px 10px 20px;
        }

        .accordion input[type="radio"]:checked + label::before {
            content: '-'
        }

    </style>
@endsection


@section('script')
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("my-slides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
    }
</script>

@endsection