<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
  <title>{{$pageName}} - {{config('app.name','HBBC')}}</title>
		<meta name="generator" content="Bootply" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- Latest compiled and minified CSS 
        <link rel="stylesheet" href="css/bootstrap.min.css">
    -->
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="{{asset('css/app.css')}}" rel="stylesheet"/>
		<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
	</head>
	<body>

        @include('inc.navbar')

        
@yield('content')

@include('inc.footer')
    <!-- script references -->
   <!--
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/nav-hover.min.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
   -->
   
   <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<!-- Place in the <head>, after the three links -->
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
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
 </body>
</html>
        