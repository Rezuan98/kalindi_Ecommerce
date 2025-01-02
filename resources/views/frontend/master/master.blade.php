<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('keyTitle')</title>
<link rel="stylesheet" href="{{ asset('frontend/css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/cart.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/product_details.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/mobile-nav.css') }}">
    {{-- bootstrap css start --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    {{-- bootstrap css end --}}

    {{-- cdn for slick slider start --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />


    {{-- cdn for slick slider start --}}
   @stack('ecomcss')

   






</head>

<body>

  
    @include('frontend.includes.navbar')
    <section id="main-area">
        @yield('contents')
    </section>

    @include('frontend.includes.footer')


    {{-- bootstrap js cdn start --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

     {{-- bootstrap js cdn end --}}
   
   @stack('ecomjs')
  {{-- cdn for alpine js start --}}
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
   {{-- cdn for alpine js end --}}

   {{-- cdn for slick slider start --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
   {{-- cdn for slick slider end--}}
  
<script src="{{ asset('frontend/js/best_selling_products.js') }}"></script>
<script src="{{ asset('frontend/js/navbar.js') }}"></script>
<script src="{{ asset('frontend/js/cart.js') }}"></script>
<script src="{{ asset('frontend/js/product_details.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.slider').slick({
            dots: false,          // Enable navigation dots
            infinite: true,      // Infinite scrolling
            speed: 500,          // Transition speed in milliseconds
            slidesToShow: 1,     // Show one slide at a time
            slidesToScroll: 1,   // Scroll one slide at a time
            autoplay: true,      // Enable autoplay
            autoplaySpeed: 3000, // Time between slides in autoplay
            arrows: false,        // Show navigation arrows
            adaptiveHeight: true // Adjust height automatically
        });
    });
</script>
@stack('ecomjs')
</body>

</html>
