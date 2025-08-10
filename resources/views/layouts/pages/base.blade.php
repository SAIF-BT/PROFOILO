<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SAIF ULLAH</title>
        <!-- Fonts -->
       <link rel="stylesheet" href="{{asset('template/assets/fonts/unicons/css/line.css')}}">
       <link rel="stylesheet" href="{{ asset("template/assets/fonts/fontawesome-free/css/all.min.css") }}" />
    <!-- CSS -->
        <!-- CSS -->

        <link rel="stylesheet" href="{{ asset('template/assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('template/assets/css/styles.css')}}">
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
         <!-- SWIPER CSS -->
         

</head>
<body class="dark-theme">
        <!--==================== HEADER ====================-->
        @include('layouts.pages.header')

        <!--==================== MAIN ====================-->
        <main class="main">
            @yield('content')
        </main>

        <!--==================== FOOTER ====================-->
        @include('layouts.pages.footer')
        
        <!--==================== SCROLL TOP ====================-->
        <a href="#" class="scrollup" id="scroll-up">
          <i class="uil uil-arrow-up scrollup_icon"></i>
        </a>

        <!--==================== SWIPER JS ====================-->
        <script src="{{ asset('template/assets/js/swiper-bundle.min.js') }}"></script>

        <!--==================== MAIN JS ====================-->
        <script src="{{ asset('template/assets/js/main.js') }}"></script>
    </body>
</html>
