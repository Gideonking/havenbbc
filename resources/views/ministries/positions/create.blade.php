
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Create Position for {{$ministry->title}}
                </div>
                <div class="panel-body">
                    @include('inc.messages')
                    {!! Form::open(['action' => 'PositionsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title','Title')}}
                            {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
                            {{Form::label('tier','Tier')}}
                            
                            
                            {{Form::number('tier','',['class' => 'form-control', 'placeholder' => 'Tier','min'=>'1','max'=>'10'])}}
                            {{Form::hidden('ministry_id',$ministry->id)}}

                            <sub><i> Note: A tier is a number that defines the level of a position in that ministry. 
                                    1 being the highest level of leadership, 
                                    2 being second in leadership, and so on...</i></sub>
                            
                            <br>    
                            <br>    
                            
                          {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
                        </div>
                              {!! Form::close()!!}
                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection