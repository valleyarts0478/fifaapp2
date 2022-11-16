<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-5GGHZ0HSJP"></script>
      <script>
       window.dataLayer = window.dataLayer || [];
       function gtag(){dataLayer.push(arguments);}
       gtag('js', new Date());

       gtag('config', 'G-5GGHZ0HSJP');
      </script>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{asset('storage/' . "favicon.ico")}}" type="image/x-icon">
        <link rel="apple-touch-icon" href="{{asset('storage/' . "apple-touch-icon.png")}} sizes="180x180">
        <link rel="icon" type="image/png" href="{{asset('storage/top/' . "android-touch-icon.png")}} sizes="192x192">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>RAL-E FIFA-PROCLUB</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
      /> --}}
      
      
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/vue@3.2.31/dist/vue.min.js"></script> --}}
    </head>
    <style>

    </style>

    <body ontouchstart="" class="font-Khand">
        <header>
           <x-front.header />
        </header>
 
          {{ $slot }}

        <footer>
            <x-front.footer />
        </footer>

    </body>
</html>
