<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hover.css') }}">
        @yield('style')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased postion-relative min-vh-100" style="overflow-x: hidden">

        <!-- Page Heading -->
        <header class="position-sticky top-0 container-fluid p-0" style="z-index:5">
            @include('partials.navigation')
        </header>

        <!-- Page Content -->
        <main class="container-fluid position-relative">
            @include('partials.messages')
            @yield('content')
        </main>
        
    </body>
</html>
