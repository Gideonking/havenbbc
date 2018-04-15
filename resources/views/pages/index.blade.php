@extends('layouts.app') @section('content')
<section>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="/storage/img/slide3.jpg" alt="">
                <div class="carousel-caption">
                    Make Donation
                </div>
            </div>
            <div class="item">
                <img src="/storage/img/slide2.jpg" alt="">
                <div class="carousel-caption">
                    Be a Donator
                </div>
            </div>
            <div class="item">
                <img src="/storage/img/slide1.jpg" alt="">
                <div class="carousel-caption">
                    Be a volunteer
                </div>
            </div>
            <div class="item">
                <img src="/storage/img/dof2.jpg" alt="">
                <div class="carousel-caption">
                    Hayaan mo Sila
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!-- Welcome Message -->
<section>
    <div class="container header-start text-center">
        <div class="heading-icon">
            <i class="fa fa-3x fa-home"></i>
        </div>
        <h1 class="main-text">Welcome to Haven Bible Baptist Church!</h1>
        <p class="text-center sub-text">
            <em class="first-line">
                {{"Still preaching the old-time gospel and singing the old-time Hymns You are cordially invited to step back in
                time to visit a church that is still preaching the old-time Gospel as it applies to life in today's world."
                }}</em>
        </p>
        <ul class="list-unstyled list-inline">
            <li>
                <a class="btn btn-primary btn-xl btn-block">History</a>
            </li>
            <li>
                <a class="btn btn-primary btn-xl btn-block">Salvation</a>
            </li>
        </ul>

    </div>

</section>
<!-- Service Times -->
<section>

    <div class="divider col-sm-12 col-xs-12 col-md-12">
        <div class="header-text">
            <span>Service</span> Times
        </div>
    </div>
@include('inc.static.services')
   
</section>
<!-- Events -->
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12">
        <div class="header-text">
            <span>Events</span> & News</div>
    </div>
    @if(count($events)> 0)
    @foreach($events as $event)
    <div class="item col-md-4">
        <div class="blok-read-sm">
            <a href="/events/{{$event->id}}" class="hover-image">
                <img src="/storage/event_images/{{$event->cover_image}}" alt="image">
                <span class="layer-block"></span>
            </a>
            <div class="content-block">
                <span class="point-caption bg-blue-point"></span>
                <span class="bottom-line bg-blue-point"></span>
                <h4>{{$event->title}}</h4>
                <small>{{$event->start}} to {{$event->end}}</small>
                <p>{{$event->description}}</p>
                <a href="/events/{{$event->id}}"><div class="button-main bg-fio-point">read more</div></a>
               
            </div>
        </div>
    </div>
  @endforeach
  
    <div class="container content-block text-center">
        <ul class="list-unstyled list-inline">
            <li>
                    <a href="/events"><div class="button-main bg-fio-point"><b>See All</b></div></a>
            </li>
        </ul>
    
    </div>
    @else
        <div class="container content-block text-center">
        <h1>No Upcoming Event</h1>
    </div>
    @endif
</section>



@endsection