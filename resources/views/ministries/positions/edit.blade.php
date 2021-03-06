
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Edit Position: {{$position->title}}
                </div>
                <div class="panel-body">
                    @include('inc.messages')
                    {!! Form::open(['action' => ['PositionsController@update', $position->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title','Title')}}
                            {{Form::text('title',$position->title,['class' => 'form-control', 'placeholder' => 'Title'])}}
                            {{Form::label('tier','Tier')}}
                            {{Form::number('tier',$position->tier,['class' => 'form-control', 'placeholder' => 'Tier','min'=>'1','max'=>'10'])}}
                            {{Form::hidden('ministry_id',$position->ministry_id)}}

                            <sub><i> Note: A tier is a number that defines the level of a position in that ministry. 
                                    1 being the highest level of leadership, 
                                    2 being second in leadership, and so on...</i></sub>
                            
                            <br>    
                            <br>    
                            
    {{Form::hidden('_method','PUT')}}
                          {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
                        </div>
                              {!! Form::close()!!}
                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection