@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text"><span>Event</span></div></div>

    <div class="container">

           <div class="blok-read-sm content-block">
                {!!Form::open(['action'=>['EventsController@destroy',$event->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                 {!!Form::close()!!}
               <a href="/events/{{$event->id}}/edit" class="btn btn-default pull-right"> Edit</a>
              
               <h1>{{$event->title}}</h1>
                   
     
               <h4>{{$event->start}} to {{$event->end}}</h4>
                <img src="/storage/event_images/{{$event->cover_image}}"/>
                           <p>{{$event->description}}</p>
                           <br>
                           {!!$event->longdescription!!}
                           <hr>
                        <small>
                            Created on: {{$event->created_at}}
                    <br>
                                Updated on: {{$event->updated_at}}
                            </small>
                        </div>

        </div>
    
</section>

@endsection