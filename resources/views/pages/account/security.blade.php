<!-- resources/views/profile.blade.php -->
@extends('layouts.account.account')

@section('title', 'Profile')

@section('main')
    @if(session('success'))
        <div id="success-notification" class="block p-3 bg-green-400 text-white font-semibold rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))   
        <div id="error-notification" class="block p-3 bg-red-400 text-white font-semibold rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('change-password') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-2">
            <div class="flex flex-col gap-2">
                <label for="old_password">Kata Sandi Lama</label>
                <input type="password" name="old_password" id="old_password" placeholder="******" class="px-3 py-2 w-full border rounded">
                @error('old_password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="new_password">Kata Sandi Baru</label>
                <input type="password" name="new_password" id="new_password" placeholder="******" class="px-3 py-2 w-full border rounded">
                @error('new_password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="new_password_confirmation">Konfirmasi Password</label>
                <input type="password" name="new_password_confirmation" placeholder="******" id="new_password_confirmation" class="px-3 py-2 w-full border rounded">
            </div>
        </div>
        <button type="submit" class="px-2 py-1 bg-teal-400 hover:bg-teal-500 mt-3 text-white rounded">Perbarui Kata Sandi</button>
    </form>
@endsection


@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const successNotification = document.getElementById('success-notification');
            const errorNotification = document.getElementById('error-notification');

            if (successNotification) {
                setTimeout(() => {
                    successNotification.style.display = 'none';
                }, 3000); // 5000 ms = 5 detik
            }

            if (errorNotification) {
                setTimeout(() => {
                    errorNotification.style.display = 'none';
                }, 3000); // 5000 ms = 5 detik
            }
        });
    </script>

@endsection