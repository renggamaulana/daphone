<nav class="flex justify-between p-5 bg-gray-900">
    <div>
        <h1 class="text-teal-500 text-2xl font-bold">
           <a href="/">Daphone</a> 
        </h1>
    </div>
    <ul class="flex justify-between text-white">
        <li class="mx-2"><a class="font-semibold hover:text-teal-400" href="{{ route('all-products') }}">All Products</a></li>
        <li class="mx-2"><a class="font-semibold hover:text-teal-400" href="{{ route('flash-sale') }}">Flash Sale</a></li>
        <li class="mx-2"><a class="font-semibold hover:text-teal-400" href="{{ route('trade-in') }}">Trade-In</a></li>
        <li class="mx-2"><a class="font-semibold hover:text-teal-400" href="{{ route('about') }}">About Us</a></li>
    </ul>
</nav>