@extends('layouts.main')

@section('title', 'Home')

@section('content')
<section class="p-20">
    {{-- <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div> --}}

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

<section>
    
</section>

@endsection