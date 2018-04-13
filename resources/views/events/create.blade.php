
@extends('layouts.app')

@section('content')
<section>
    <div class="divider col-sm-12 col-xs-12 col-md-12"><div class="header-text">Create <span>Event</span></div></div>

    <div class="container">
            
           <div class="blok-read-sm content-block">
                @include('inc.messages')
      {!! Form::open(['action' => 'EventsController@store', 'method' => 'POST']) !!}
<div class="form-group">
    {{Form::label('title','Title')}}
    {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
    {{Form::label('shortdescription','Short Description')}}
    {{Form::text('description','',['class' => 'form-control', 'placeholder' => 'Description'])}}
    {{Form::label('longdescription','Long Description')}}
    {{Form::textarea('longdescription','',['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Description'])}}
  <div class="form-row">
      <div class="col">    
          {{Form::label('start','Start Date')}}
            {{Form::datetimelocal('start','',['class' => 'form-control'])}}
        </div>
        <div class="col">   
    {{Form::label('end','End Date')}}
    {{Form::datetimelocal('end','',['class' => 'form-control'])}}
        </div>
    </div>
    <br>    
  {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
</div>
      {!! Form::close()!!}
        </div>
    
</section>

@endsection