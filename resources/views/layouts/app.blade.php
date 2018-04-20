<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
 <!--   <div id="app"> -->
        @include('inc.adminnavbar')
        @include('inc.navbar')
        @yield('content')
        @include('inc.footer')
 <!--   </div> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
            $('.testimonials-slider').bxSlider({
             slideWidth: 800,
             minSlides: 1,
             maxSlides: 1,
             slideMargin: 32,
             auto: true,
             autoControls: true
             });
           </script>
           <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
     <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script>
            CKEDITOR.replace( 'article-ckeditor' );
        </script>
        <script>
                window.sr = ScrollReveal({viewFactor:0.5});
                sr.reveal('.fromBottom',{origin:'bottom',duration:1000,distance:'500px'},50);
                sr.reveal('.fromLeft',{origin:'left',duration:1000,distance:'500px'},50);
                sr.reveal('.fromRight',{origin:'right',duration:1000,distance:'500px'},50);
                sr.reveal('.fromTop',{origin:'top',duration:1000,distance:'100px'},50);
        </script>
</body>
</html>
