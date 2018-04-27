@extends('layouts.app') @section('content')
<!-- Carousel -->
@include('inc.dynamic.carousel')
<!-- Welcome Message -->
@include('inc.static.welcomemsg')
<!-- Service Times -->

@include('inc.static.services')
   
</section>
<!-- Events -->
@include('inc.dynamic.events')
<!-- Visit Us -->
@include('inc.static.visitus')
<!-- Salvation -->
@include('inc.static.salvationmini')
<!-- Pastor -->
@include('inc.static.pastor')

@endsection