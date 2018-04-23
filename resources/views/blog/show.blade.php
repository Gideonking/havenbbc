@extends('layouts.app')

@section('content')
<section>
    

    <div class="container">

        <div class="panel" >
               <div class="panel-heading" style="padding-top:60px;padding-bottom:60px;background:url('/storage/blog_images/{{$post->cover_image}}');background-repeat:no-repeat;background-size:cover;background-position:center">
                    <div class="header-text text-center"style="color:blanchedalmond; text-shadow: 2px 2px 8px #000000;">
                        <span>{{$post->title}}</span>
                        
                    </div>   
           
               </div>
               
               @if(!Auth::guest())
                {!!Form::open(['action'=>['BlogPostsController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right','id'=>'form_delete'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger','name' => 'delete_modal'])}}
                 {!!Form::close()!!}
               <a href="/blog/{{$post->id}}/edit" class="btn btn-default pull-right"> Edit</a>
 
               @endif
              <div class="panel-body">
                   

                           {!!$post->body!!}
                        </div>
                                     
                      <div class="panel-footer">
                        <small>
                            Created on: {{$post->created_at}}
                    <br>
                                Updated on: {{$post->updated_at}}
                            </small>
                        </div>
        </div>
    </div>
    </div>
    
</section>

@endsection