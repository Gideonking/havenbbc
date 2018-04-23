
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Positions
                </div>
                <div class="panel-body">
                        @include('inc.messages')
<!-- List of Ministries -->
@if(count($ministries)>0)
@foreach($ministries as $ministry)
                    <div class="panel panel-success">
                            <div class="panel-heading">
                                    <a href="/ministries/{{$ministry->id}}"
                                        class="btn btn-success btn-md">
                                       <b> {{$ministry->title}}</b>
                                    </a> 
                                    <span class="label label-info"> Positions
                                    <span class="label label-danger">{{count($ministry->positions)}}</span>
                                    </span>
                                    <a href="/positions/create/{{$ministry->id}}" class="btn btn-primary btn-xs pull-right">
                                        Add Position
                                    </a>
                                    <div class="clear-fix"></div>
                                    
                            </div><!-- end of a ministry heading -->
                            <div class="panel-body">
                                    @if(count($ministry->positions)>0)
                                        @foreach($ministry->positions as $position)
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                {{$position->title}} <span class="badge">T{{$position->tier}}</span></button>
                                                
                                                {!!Form::open(['action'=>['PositionsController@destroy',$position->id],'method' => 'POST','class'=>' pull-right','id'=>'form_delete'])!!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::submit('Delete Position',['class' => 'btn btn-danger  btn-xs'])}}
                                                 {!!Form::close()!!}
                                                 <a href="/positions/{{$position->id}}/edit" class="btn btn-success btn-xs pull-right">
                                                    Edit Position
                                            </a>
                                                
                                            </div><!-- end of a position heading -->
                                            <div class="panel-body">
                                                @if(count($position->leaders)>0)
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <img src="/storage/profile_images/{{$position->leaders[0]->cover_image}}" alt="" class="img-thumbnail img-responsive">        
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                        Assigned Member:<br>
                                                        <a href="/leaders/{{$position->leaders[0]->id}}/edit/"><p class="lead"><b> {{$position->leaders[0]->title}} {{$position->leaders[0]->name}}</b></p>
                                                        </a>
                                                        </div>
                                                <div class="col-md-3 col-sm-3 col-xs-12">
                                                {!!Form::open(['action'=>['PositionsController@clearLeader',$position->id],'method' => 'POST','class'=>' pull-right','id'=>'form_delete'])!!}
                                                {{Form::hidden('_method','DELETE')}}
                                                {{Form::submit('Clear Assignment',['class' => 'btn btn-danger  btn-xs'])}}
                                                 {!!Form::close()!!}
                                                
                                                <a href="/positions/assign/{{$position->id}}/edit" class="btn btn-success btn-xs pull-right">
                                                        Edit Assignment
                                                </a>
                                                </div>
                                            
                                                @else
                                                No Assigned Member!
                                                <a href="/positions/{{$position->id}}/assign/" class="btn btn-primary btn-xs pull-right">
                                                        Add Assignment
                                                </a>
                                                @endif
                                            </div><!-- end of a position heading -->
                                        </div> <!--end of a position panel-->    
                                        @endforeach
                                    @else
                                    No Position Yet
                                    @endif
                            </div><!-- end of a ministry body -->
                    </div><!-- end of a ministry panel -->
@endforeach
 @else
 No Positions
 @endif       
                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection