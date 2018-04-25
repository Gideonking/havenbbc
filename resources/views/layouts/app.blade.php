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

    <!-- meta -->
    <link rel="apple-touch-icon" sizes="57x57" href="/storage/meta/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/storage/meta/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/storage/meta/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/storage/meta/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/storage/meta/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/storage/meta/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/storage/meta/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/storage/meta/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/storage/meta/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/storage/meta/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/storage/meta/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/storage/meta/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/storage/meta/favicon-16x16.png">
<link rel="manifest" href="/storage/meta/manifest.json">
<meta name="msapplication-TileColor" content="#00aeef">
<meta name="msapplication-TileImage" content="/storage/meta/ms-icon-144x144.png">
<meta name="theme-color" content="#00aeef">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
 <!--   <div id="app"> -->
         @include('inc.modal')
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
