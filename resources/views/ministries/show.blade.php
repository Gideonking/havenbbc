@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text"><span>{{$ministry->title}}</span></div></div>

    <div class="container">

           <div class="blok-read-sm content-block">
                {!!Form::open(['action'=>['MinistriesController@destroy',$ministry->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                 {!!Form::close()!!}
               <a href="/ministries/{{$ministry->id}}/edit" class="btn btn-default pull-right"> Edit</a>
              
            
                   
     
                <img src="/storage/ministry_images/{{$ministry->cover_image}}"/>
                           <p>{{$ministry->description}}</p>
                           <br>
                           {!!$ministry->longdescription!!}
                           <hr>
                        <small>
                            Created on: {{$ministry->created_at}}
                    <br>
                                Updated on: {{$ministry->updated_at}}
                            </small>
                        </div>

        </div>
    
</section>

@endsection