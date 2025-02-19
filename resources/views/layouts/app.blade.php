<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <main>
                @yield('content')
            </main>
        </div>
        <script src="https://kit.fontawesome.com/e6c717924c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </body>
</html>
