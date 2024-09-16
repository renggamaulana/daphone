<!-- resources/views/layouts/account.blade.php -->
@extends('layouts.main')

@section('content')
    <section class="p-10 md:px-20 md:py-10">
        <h1 class="text-2xl font-semibold">Selamat datang kembali, {{ Auth::user()->name }}</h1>
        <div class="flex md:flex-row flex-col-reverse gap-5">
            <aside class="w-full md:w-1/4">
                @include('layouts.account.aside')
            </aside>
            <main class="w-full md:w-3/4">
                @include('layouts.account.main')
            </main>
        </div>
    </section>
@endsection
