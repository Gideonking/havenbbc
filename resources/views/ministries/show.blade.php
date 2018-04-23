@extends('layouts.app')

@section('content')

<section class="ministry-block ministry-bg ministry-img" >
       
    <div class="" style="background: url('/storage/ministry_images/{{$ministry->cover_image}}') center center no-repeat;
        background-size: cover;">
        
    <div class="container section-spaced">   

            @if(!Auth::guest())
            <div class="col-sm-12 col-xs-12 col-md-12">
        {!!Form::open(['action'=>['MinistriesController@destroy',$ministry->id],'method' => 'POST', 'class' => 'pull-right','id'=>'form_delete'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
         {!!Form::close()!!}
       <a href="/ministries/{{$ministry->id}}/edit" class="btn btn-default pull-right"> Edit</a>
            </div>
       @endif  

            <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text header-text-light text-center section-spaced"><span>{{$ministry->title}}</span></div>
           
  
       <div class="clear-fix"></div><br>
             
               <div class="container light-text text-center">
 
                        <img src="/storage/ministry_images/{{$ministry->cover_image}}" class="img-thumbnail"/>
                        
                        <p class="light-text">{{$ministry->description}}</p>
                        <br>
                        @if(count($ministry->positions)>0)
                        <h2>Leaders</h2>
                        <br>
                        <div class="container-fluid">
                        <div class="col" >
                            
                        @foreach($ministry->positions as $position)
                        <div class="col-md-3 col-sm-4 col-xs-6">
                            
                            <p class="lead">
                            @if(count($position->leaders)>0)
                            <img src="/storage/profile_images/{{$position->leaders[0]->cover_image}}" alt="" class="img-thumbnail img-responsie"><br>
                            {{$position->leaders[0]->title}} {{$position->leaders[0]->name}}
                                
                            @else
                            Not Assigned
                            @endif  
                            <br><small>{{$position->title}}</small>
                        </p>            
                        </div>
                        @endforeach
                    </div>
                    </div>
                        @endif
                        <br><!-- col-md-3 col-sm-4 col-xs-6 -->
                        <div class="col-md-12 col-sm-12 col-xs-12  section-spaced">
                                  
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

</div>
  

    
</section>

@endsection