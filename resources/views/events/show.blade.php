@extends('layouts.app')

@section('content')
<section>
    

    <div class="container">

        <div class="panel" >
               <div class="panel-heading" style="padding-top:40px;padding-bottom:40px;background:url('/storage/event_images/{{$event->cover_image}}');background-repeat:no-repeat;background-size:cover;background-position:center">
                    <div class="header-text"style="color:blanchedalmond; text-shadow: 2px 2px 8px #000000;"><span>{{$event->title}}</span>
                        <h2 class="pull-right">{{$event->start}}</h2>
                    </div>   
           
           <div class="clear-fix"></div>
               </div>
               <div class="panel-body">
               @if(!Auth::guest())
                {!!Form::open(['action'=>['EventsController@destroy',$event->id],'method' => 'POST', 'class' => 'pull-right','id'=>'form_delete'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                 {!!Form::close()!!}
               <a href="/events/{{$event->id}}/edit" class="btn btn-default pull-right"> Edit</a>
              @endif
              
                   
     <div class="container">
               <h4>{{$event->start}} to {{$event->end}}</h4>
                      
                           <p class="lead">{{$event->description}}</p>
                           <br>
                           {!!$event->longdescription!!}
                  
                        <br>
                    </div>
                    </div>
                           <div class="panel-footer">
                        <small>
                            Created on: {{$event->created_at}}
                    <br>
                                Updated on: {{$event->updated_at}}
                            </small>
                        </div>
                        </div>
        </div>

    </div>
    
</section>

@endsection