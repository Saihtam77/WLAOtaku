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
        <script src="{{ asset('js/script.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased postion-relative min-vh-100" style="overflow-x: hidden">

        <!-- Page Heading -->
        <header id="Menu" class="bg-dark text-light position-fixed vh-100 col-6 col-lg-2">
            @include('partials.navigation')
        </header>
       
        
        <!-- Page Content -->
        <main class="container-fluid position-relative">
            @include('partials.messages')
            @include('partials.menu_toggle_btn')
            @yield('content')
        </main>
        
    </body>
</html>
