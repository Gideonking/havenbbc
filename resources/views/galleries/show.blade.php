@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text">Gallery - <span>{{$gallery->title}}</span></div></div>

    <div class="container">

           <div class="blok-read-sm content-block">
                @if(!Auth::guest())
                {!!Form::open(['action'=>['GalleriesController@destroy',$gallery->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                 {!!Form::close()!!}
               <a href="/galleries/{{$gallery->id}}/edit" class="btn btn-default pull-right"> Edit</a>
              @endif
              
                   
     
                           <p>{{$gallery->description}}</p>
@if(count($gallery->images))
                           <div id="app" class="container content-block">
                                <vue-picture-swipe :items="[
                                    @foreach($gallery->images as $image)
                                    {
                                    class: 'col-md-4 col-sm-12 col-xs-12',
                                    src: '{{asset('storage/gallery_images/'.$image->path)}}',
                                    thumbnail: '{{asset('storage/gallery_images/'.$image->path)}}',
                                    w: {{$image->width}},
                                    h:{{$image->height}},
                                    title:'{{$image->caption}}'

                                },
                                    @endforeach
                                  ]"></vue-picture-swipe>
                           </div>
                           @else
                           <h2> Empty Gallery </h2>
                           @endif
                  <hr>
                        <small>
                            Created on: {{$gallery->created_at}}
                    <br>
                                Updated on: {{$gallery->updated_at}}
                            </small>
                        </div>

        </div>
    
</section>

@endsection