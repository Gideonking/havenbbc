
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Assign Leaders as {{$position->title}}
                   <span class="label label-success">Leaders <span class="badge">{{count($leaders)}}</span></span>
                   <a href="/leaders/create" class="btn btn-xs btn-primary pull-right">Create New Leader</a>
                </div>
                <div class="panel-body">
                        @include('inc.messages')
<!-- List of Ministries -->
@if(count($leaders)>0)
@foreach($leaders as $leader)
                    <div class="panel panel-success">
                        <div class="panel-heading">{{$leader->title}} {{$leader->name}}
                                {!! Form::open(['action' => 'PositionsController@assignLeader', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class'=>' pull-right']) !!}
                                {{Form::hidden('leader_id',$leader->id)}}
                                {{Form::hidden('position_id',$position->id)}}
                                {{Form::submit('Assign',['class'=> 'btn btn-xs btn-success'])}}
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