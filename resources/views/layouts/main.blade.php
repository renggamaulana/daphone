<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daphone | @yield('title')</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<style>
    :root {
        --ff: "Inter", sans-serif;
        --color-primary: #ffffff;
        --color-secondary: #000000;
        --color-accent: #0a9795;
        --h1: bold 64px/72px var(--ff);
        --p: 18px/30px var(--ff);
    }

    p, h1 {
        font-family: var(--ff);
        color: #333333;
    }
</style>
<body class="bg-gray-100">
    <div class="flex flex-col min-h-screen">
        @include('layouts.header')

        <div class="flex-grow">
            @yield('content')
        </div>

        @include('layouts.footer')
        
        @yield('style')
        @yield('script')
        <script src="{{ mix('js/app.js') }}"></script>
    </div>
</body>
</html>