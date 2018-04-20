<section class="section-spaced" style="background-color:linen;">
  

    <div class="container">
        <div class="divider col-sm-12 col-xs-12 col-md-12">
            <div class="header-text">
                <span>Events</span> & News
            </div>
        </div>
    @if(count($events)> 0)
        <div class="row">
            @foreach($events as $event)
                <div class="item col-md-4 col-sm-6 col-xs-12 fromBottom">
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
                            <a href="/events/{{$event->id}}">
                                <div class="button-main bg-fio-point">read more</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class=" button-main  text-center">
            <ul class="list-inline">
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
    </div>
</section>