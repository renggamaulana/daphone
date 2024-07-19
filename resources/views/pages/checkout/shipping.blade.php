@extends('layouts.main')

@section('title', 'Shipping')

@section('content')
    <section class="p-10 flex gap-4">
        <div class="w-4/6 border rounded p-10">
            <h1>Alamat Pengiriman</h1>
            <div class="grid grid-cols-2 gap-3">
                <div class="flex flex-col gap-2">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="">
                </div>
            </div>
        </div>

        <div class="w-2/6 border rounded">

        </div>
    </section>

@endsection