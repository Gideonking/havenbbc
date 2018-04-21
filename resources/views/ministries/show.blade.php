@extends('layouts.app')

@section('content')
<section class="ministry-block ministry-bg ministry-img" >
    <div class="" style="background: url('/storage/ministry_images/{{$ministry->cover_image}}') center center no-repeat;
        background-size: cover;">
      
    <div class="container section-spaced">   
             @if(!Auth::guest())
            {!!Form::open(['action'=>['MinistriesController@destroy',$ministry->id],'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
             {!!Form::close()!!}
           <a href="/ministries/{{$ministry->id}}/edit" class="btn btn-default pull-right"> Edit</a>
           @endif
            <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text header-text-light text-center section-spaced"><span>{{$ministry->title}}</span></div>

           
  
       <div class="clear-fix"></div><br>
             
               <div class="container light-text text-center">
 
                        <img src="/storage/ministry_images/{{$ministry->cover_image}}" class="img-thumbnail"/>
                        
                        <p class="light-text">{{$ministry->description}}</p>
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
    </div>

</div>
  

    
</section>

@endsection