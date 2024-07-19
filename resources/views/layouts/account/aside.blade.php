<aside class="border p-8 mt-5 rounded shadow bg-white">
    <nav>
        <ul class="flex flex-col gap-2">
            <li class="w-full">
                <a href="{{ route('profile') }}" class="@if(request()->routeIs('profile')) text-gray-700 bg-gray-100 @endif text-gray-400 font-semibold hover:text-gray-700 hover:bg-gray-100 px-2 py-1 rounded block w-full">Profil</a>
            </li>
            <li class="w-full">
                <a href="{{ route('security') }}" class="@if(request()->routeIs('security')) text-gray-700 bg-gray-100 @endif text-gray-400 font-semibold hover:text-gray-700 hover:bg-gray-100 px-2 py-1 rounded block w-full">Kemanan</a>
            </li>
            <hr>
            <li class="w-full">
                <a href="{{ route('orders') }}" class="@if(request()->routeIs('orders')) text-gray-700 bg-gray-100 @endif text-gray-400 font-semibold hover:text-gray-700 hover:bg-gray-100 px-2 py-1 rounded block w-full">Pesanan</a>
            </li>
            <li class="w-full">
                <a href="{{ route('address') }}" class="@if(request()->routeIs('address')) text-gray-700 bg-gray-100 @endif text-gray-400 font-semibold hover:text-gray-700 hover:bg-gray-100 px-2 py-1 rounded block w-full">Alamat</a>
            </li>
            <hr>
            <a href="{{ route('logout') }}" class="bg-red-600 text-white text-md p-2 text-center rounded font-semibold">Keluar</a>
        </ul>
    </nav>
</aside>