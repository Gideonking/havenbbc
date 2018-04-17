
@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text">Edit <span>Gallery</span></div></div>

    <div class="container">
            
           <div class="blok-read-sm content-block">
                @include('inc.messages')
      {!! Form::open(['action' => ['GalleriesController@update', $gallery->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',$gallery->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
    {{Form::label('shortdescription','Short Description')}}
    {{Form::text('description',$gallery->description,['class' => 'form-control', 'placeholder' => 'Description'])}}
    <br>
 
    {{Form::hidden('_method','PUT')}}
  {{Form::submit('Submit',['class'=> 'btn btn-primary pull-right'])}}
</div>
      {!! Form::close()!!}
        </div>
    
</section>

<section>
         <div class="container">
                <h1>Photos</h1>
                <div class="blok-read-sm content-block text-center">
                        {!! Form::open(['action' => ['GalleriesController@updateMany', $gallery->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                                {{Form::label('photos','Add Photos')}}
                            {{Form::file('photos',['multiple','accept'=>'image/*','name'=>'photos[]'])}}
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Upload',['class'=> 'btn btn-primary pull-right'])}}
                        </div>
                        {!! Form::close()!!}

                </div>  
                <div class="blok-read-sm content-block">
                    @if(count($gallery->images)>0)

                @foreach($gallery->images as $image)
                <!-- start of photo --->
   
        
          {!! Form::open(['action' => ['PhotosController@update', $image->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group" id="photo{{$image->id}}">
            <div class="row">
                    <div class="col-md-4 col-sm-4">    
                      <img src="/storage/gallery_images/{{$image->path}}" />
                      </div>
                      <div class="col-md-8 col-sm-8">   
                  {{Form::label('caption','Caption')}}
                  {{Form::text('caption',$image->caption,['class' => 'form-control', 'placeholder' => 'Caption'])}}
<br>

{{Form::hidden('_method','PUT')}}
{{Form::hidden('gallery_id',$gallery->id)}}
{{Form::submit('Save',['class'=> 'btn btn-primary  pull-right'])}}

{!! Form::close()!!}
                  {!!Form::open(['action'=>['PhotosController@destroy',$image->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::hidden('gallery_id',$gallery->id)}}
                  {{Form::submit('Delete',['class' => 'btn btn-danger'])}}
                   {!!Form::close()!!}

                
                      </div>
                  </div>
                  <hr>
                  
                 
    </div>
@endforeach

@else
<h2>Empty Gallery</h2>
@endif
<small> {{count($gallery->images)}} photos</small>
    <!-- end of photo -->
            </div>
        
    </section>

@endsection