
@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text">Edit <span>Post</span></div></div>

    <div class="container">
            
           <div class="blok-read-sm content-block">
                @include('inc.messages')
      {!! Form::open(['action' => ['BlogPostsController@update', $post->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',$post->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
    {{Form::label('body','Body')}}
    {{Form::textarea('body',$post->body,['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body'])}}
    <br>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    <br>   
    {{Form::hidden('_method','PUT')}}
  {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
</div>
      {!! Form::close()!!}
        </div>
    
</section>

@endsection