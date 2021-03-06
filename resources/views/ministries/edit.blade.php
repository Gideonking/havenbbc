
@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text">Edit <span>ministry</span></div></div>

    <div class="container">
            
           <div class="blok-read-sm content-block">
                @include('inc.messages')
      {!! Form::open(['action' => ['MinistriesController@update', $ministry->id], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title',$ministry->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
    {{Form::label('shortdescription','Short Description')}}
    {{Form::text('description',$ministry->description,['class' => 'form-control', 'placeholder' => 'Description'])}}
    {{Form::label('longdescription','Long Description')}}
    {{Form::textarea('longdescription',$ministry->longdescription,['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Description'])}}

    <br>
    @include('inc.uploadimage')
    <br>   
    {{Form::hidden('_method','PUT')}}
  {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
</div>
      {!! Form::close()!!}
        </div>
    
</section>

@endsection