<header class="hidden md:flex justify-between my-2">
    <div class="px-10">
        <a class="text-[#25D366] flex justify-center gap-2" target="_blank" href="https://wa.me/+6289614432052">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
            </svg>
            <span class="text-black hover:text-[#25D366]">Hubungi Kami!</span>
        </a>
    </div>
    <ul class="flex justify-center">
        @guest
            <li class="mx-2">
                <a class="font-semibold hover:text-teal-400 flex gap-1" href="{{ route('login') }}">
                Akun
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                </a>
            </li>

        @else
            <li class="mx-2">
                <a class="font-semibold hover:text-teal-400 flex gap-1" href="{{ route('profile') }}">
                {{ Auth::user()->name }}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                </a>
            </li>
        @endguest

        <li class="mx-2">
            <a class="font-semibold hover:text-teal-400 flex gap-1" href="{{ route('about') }}">
            Tentang
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
            </svg>

            </a>
        </li>
        <li class="mx-2">
            <a class="font-semibold hover:text-teal-400 flex gap-1" href="{{ route('checkout.cart') }}">
            Keranjang
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            </a>
        </li>
    </ul>
</header>
<nav class="flex justify-between p-5 bg-gray-900 relative">
    <div>
        <a href="/">
            <img src="{{ asset('logo/daphone-1.png') }}" class="max-w-20 absolute bottom-[-7px]" alt="">
        </a>
    </div>
    <button onclick="toggleMenu()" class="md:hidden p-1 border rounded-lg text-white">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
        </svg>
    </button>
    <ul class="hidden md:flex justify-between text-white">
        <li class="mx-2"><a class="font-semibold hover:text-teal-400" href="{{ route('products.index') }}">Semua Produk</a></li>
        <li class="mx-2"><a class="font-semibold hover:text-teal-400" href="{{ route('trade-in') }}">Tukar Tambah</a></li>
        <li class="mx-2"><a class="font-semibold hover:text-teal-400" href="{{ route('sell-phone') }}">Jual</a></li>
    </ul>
    <!-- Dropdown Menu -->
    <div id="mobile-menu" class="z-10 fixed w-full left-0 top-0 p-10 bg-gray-900 text-white flex flex-col items-center justify-center space-y-4 md:hidden hidden">
        <button onclick="toggleMenu()" class="absolute top-4 right-4 p-2 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M6.293 5.293a1 1 0 0 1 1.414 0L12 8.586l4.293-4.293a1 1 0 0 1 1.414 1.414L13.414 10l4.293 4.293a1 1 0 0 1-1.414 1.414L12 11.414l-4.293 4.293a1 1 0 0 1-1.414-1.414L10.586 12 6.293 7.707a1 1 0 0 1 0-1.414Z" clip-rule="evenodd" />
            </svg>
        </button>
        <ul class="space-y-4">
            <li><a class="font-semibold hover:text-teal-400" href="{{ route('products.index') }}">Semua Produk</a></li>
            <li><a class="font-semibold hover:text-teal-400" href="{{ route('trade-in') }}">Tukar Tambah</a></li>
            <li><a class="font-semibold hover:text-teal-400" href="{{ route('sell-phone') }}">Jual</a></li>
            <hr>
            @guest
                <li><a class="font-semibold hover:text-teal-400" href="{{ route('login') }}">Akun</a></li>
            @else
                <li><a class="font-semibold hover:text-teal-400" href="{{ route('profile') }}">{{ Auth::user()->name }}</a></li>
            @endguest
            <li><a class="font-semibold hover:text-teal-400" href="{{ route('checkout.cart') }}">Keranjang</a></li>
            <li><a class="font-semibold hover:text-teal-400" href="{{ route('about') }}">Tentang</a></li>
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>
