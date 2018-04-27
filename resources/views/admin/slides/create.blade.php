
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Create New Slide
                </div>
                <div class="panel-body">
                @include('inc.messages')
                {!! Form::open(['action' => 'SlidesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        {{Form::label('title','Title')}}
                        {{Form::text('title','',['class'=>'form-control'])}}
                        {{Form::label('description','Description')}}
                        {{Form::text('description','',['class' => 'form-control', 'placeholder' => 'Description'])}}
                              <br>
                        <div class="form-group">
                                {{Form::label('coverimage','Cover Image')}}
                            {{Form::file('cover_image')}}
                        </div>
                        <br>  
                        <div class="form-group">
                        {{Form::label('iscalltoaction','Include Call to Action?')}}  
                        {{Form::checkbox('is_linked[]',1,0)}}<br>
                        {{Form::label('cto','Call to Action Button Label')}}  
                        {{Form::text('label','',['class' => 'form-control', 'placeholder' => 'Button Label'])}}
                        {{Form::label('cto','Call to Action Link')}}  
                        {{Form::text('link','',['class' => 'form-control', 'placeholder' => 'Link'])}}

                    </div>
                    {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
                    </div>
                        {!! Form::close()!!}

                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection