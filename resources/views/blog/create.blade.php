
@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text">Create <span>Post</span></div></div>

    <div class="container">
            
           <div class="blok-read-sm content-block">
                @include('inc.messages')
      {!! Form::open(['action' => 'BlogPostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
    {{Form::label('body','Body')}}
    {{Form::textarea('body','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body'])}}

    <br>
    <div class="form-group">
            {{Form::label('coverimage','Cover Image')}}
        {{Form::file('cover_image')}}
    </div>
    <br>    
    
  {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
</div>
      {!! Form::close()!!}
        </div>
    
</section>

@endsection
