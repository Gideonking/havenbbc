

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Edit Slide
                </div>
                <div class="panel-body">
                @include('inc.messages')
                {!! Form::open(['action' => ['SlidesController@update',$slide->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        {{Form::label('title','Title')}}
                        {{Form::text('title',$slide->title,['class'=>'form-control'])}}
                        {{Form::label('description','Description')}}
                        {{Form::text('description',$slide->description,['class' => 'form-control', 'placeholder' => 'Description'])}}
                              <br>
                        <div class="form-group">
                                {{Form::label('coverimage','Cover Image')}}
                            {{Form::file('cover_image')}}
                        </div>
                        <br>  
                        <div class="form-group">
                        {{Form::label('iscalltoaction','Include Call to Action?')}}  
                        {{Form::checkbox('is_linked[]',1,$slide->is_linked)}}<br>
                        {{Form::label('cto','Call to Action Button Label')}}  
                        {{Form::text('label',$slide->label,['class' => 'form-control', 'placeholder' => 'Button Label'])}}
                        {{Form::label('cto','Call to Action Link')}}  
                        {{Form::text('link',$slide->link,['class' => 'form-control', 'placeholder' => 'Link'])}}

                        {{Form::hidden('_method','PUT')}}
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