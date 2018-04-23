
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Edit Leader Assignment as {{$position->title}}
                   <span class="label label-success">Leaders <span class="badge">{{count($leaders)}}</span></span>
                   <a href="/leaders/create" class="btn btn-xs btn-primary pull-right">Create New Leader</a>
            
                   <br>
                   
                   <span class="label label-warning">Current Leader: <big>{{$leaders[0]->title}} {{$leaders[0]->name}}</big></span>
                       </div>
                <div class="panel-body">
                        @include('inc.messages')
<!-- List of Ministries -->
@if(count($leaders)>0)
@foreach($leaders as $leader)
                    <div class="panel panel-success">
                        <div class="panel-heading">{{$leader->title}} {{$leader->name}}
                                {!! Form::open(['action' => ['PositionsController@updateLeader', $position->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>' pull-right']) !!}
                                {{Form::hidden('leader_id',$leader->id)}}
                                {{Form::hidden('position_id',$position->id)}}
                                {{Form::hidden('_method','PUT')}}
                                {{Form::submit('Assign',['class'=> 'btn btn-xs btn-success'])}}
                                {!! Form::close()!!}
                            </div>
                    </div><!-- end of a ministry panel -->
@endforeach
 @else
 No Leaders!
 @endif       
                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection