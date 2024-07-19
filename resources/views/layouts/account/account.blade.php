<!-- resources/views/layouts/account.blade.php -->
@extends('layouts.main')

@section('content')
    <section class="px-20 py-10">
        <h1 class="text-2xl font-semibold">Selamat datang kembali, {{ Auth::user()->name }}</h1>
        <div class="flex gap-5">
            <aside class="w-1/4">
                @include('layouts.account.aside')
            </aside>
            <main class="w-3/4">
                @include('layouts.account.main')
            </main>
        </div>
    </section>
@endsection
